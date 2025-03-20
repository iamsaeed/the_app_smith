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

            // Step 3: Get and attach image to the service
            $this->info('Searching for an appropriate image...');
            if (isset($serviceData['image_search_terms']) && !empty($serviceData['image_search_terms'])) {
                $this->line('Using search terms: ' . implode(', ', $serviceData['image_search_terms']));

                $imageData = $unsplashService->getImage($serviceData['image_search_terms']);

                if ($imageData) {
                    $this->info('Found image: ' . $imageData['filename']);
                    $this->info('Photographer: ' . $imageData['photographer']);

                    // Add the image to the media library
                    $service->addMedia($imageData['path'])
                        ->usingName($service->name)
                        ->withCustomProperties([
                            'photographer' => $imageData['photographer'],
                            'credit_url' => $imageData['credit_url'],
                            'source' => 'Unsplash'
                        ])
                        ->toMediaCollection('image');

                    $this->info('Image attached to service successfully.');
                } else {
                    $this->warn('No suitable image found. Using default image.');
                }
            } else {
                $this->warn('No image search terms generated. Using default image.');
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
