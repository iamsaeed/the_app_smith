<?php

namespace App\Console\Commands;

use App\Models\Service;
use App\Models\ProductFeature;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Services\OpenAIService;
use App\Services\UnsplashService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class GenerateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:service {name : The name of the service to generate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a service with AI-generated content';

    /**
     * Execute the console command.
     */
    public function handle(OpenAIService $openAIService, UnsplashService $unsplashService)
    {
        $serviceName = $this->argument('name');

        $this->info("Generating content for service: {$serviceName}");

        try {
            DB::beginTransaction();

            // Step 1: Generate base service data
            $this->info('Generating service data...');
            $serviceData = $openAIService->generateServiceData($serviceName);

            if (!$serviceData) {
                $this->error('Failed to generate service data.');
                return 1;
            }

            // Step 2: Create the service
            $this->info('Creating service...');
            $service = Service::create([
                'name' => $serviceData['title'] ?? $serviceName,
                'description' => $serviceData['description'] ?? '',
                'status' => true,
                'created_id' => 1, // Default admin user
                'updated_id' => 1, // Default admin user
            ]);

            // Step 3: Get image for the service using FetchUnsplashImageCommand
            $this->info('Fetching image for service...');
            $imageSearchTerm = $serviceData['title'] ?? $serviceName;

            // Run the command to fetch image
            $exitCode = Artisan::call('unsplash:get-image', [
                'description' => $imageSearchTerm
            ]);

            if ($exitCode === 0) {
                // Get the output from the command
                $output = Artisan::output();

                // Extract the image path from the output
                if (preg_match('/Public URL: (.+)$/m', $output, $matches)) {
                    $publicUrl = trim($matches[1]);
                    $this->info("Image URL: $publicUrl");

                    // Extract the filename from the URL
                    $filename = basename($publicUrl);
                    $sourcePath = Storage::disk('public')->path('unsplash/' . $filename);

                    // Create the destination directory if it doesn't exist
                    $destinationDir = public_path('images/services');
                    if (!File::exists($destinationDir)) {
                        File::makeDirectory($destinationDir, 0755, true);
                    }

                    // Copy the image to the services folder
                    $destinationPath = $destinationDir . '/' . $filename;
                    File::copy($sourcePath, $destinationPath);

                    // Add the image to the media library
                    $service->addMedia($destinationPath)
                        ->usingName($service->name)
                        ->withCustomProperties([
                            'source' => 'Unsplash'
                        ])
                        ->toMediaCollection('image');

                    $this->info('Image attached to service successfully.');

                    // Delete the temporary file
                    File::delete($sourcePath);
                    $this->info('Temporary image file cleaned up.');
                } else {
                    $this->warn('Could not extract image path from command output. Using default image.');
                }
            } else {
                $this->warn('Failed to fetch image from Unsplash. Using default image.');
            }

            DB::commit();

            $this->info('Service generation completed successfully!');
            $this->info("Service ID: {$service->id}");
            $this->info("Service Name: {$service->name}");

            return 0;
        } catch (\Exception $e) {
            DB::rollback();
            $this->error('Error generating service: ' . $e->getMessage());
            Log::error('Error generating service: ' . $e->getMessage());
            return 1;
        }
    }
}
