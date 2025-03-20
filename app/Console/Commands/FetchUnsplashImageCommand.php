<?php

namespace App\Console\Commands;

use App\Services\UnsplashService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FetchUnsplashImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unsplash:get-image {description : The description to search for}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch a single image from Unsplash based on a description';

    /**
     * The Unsplash service.
     *
     * @var \App\Services\UnsplashService
     */
    protected $unsplashService;

    /**
     * Create a new command instance.
     *
     * @param \App\Services\UnsplashService $unsplashService
     * @return void
     */
    public function __construct(UnsplashService $unsplashService)
    {
        parent::__construct();
        $this->unsplashService = $unsplashService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $description = $this->argument('description');
        $this->info("Searching Unsplash for images related to: {$description}");

        try {
            // Search Unsplash for images
            $imageUrl = $this->unsplashService->getUnsplashImage($description);

            if (!$imageUrl) {
                $this->error("No image found for the description: {$description}");
                return 1;
            }

            // Generate a unique filename
            $filename = Str::slug($description) . '-' . Str::random(8) . '.jpg';
            $path = 'unsplash/' . $filename;

            // Download and save the image
            $imageContents = file_get_contents($imageUrl);
            Storage::disk('public')->put($path, $imageContents);

            $fullPath = Storage::disk('public')->path($path);
            $publicUrl = Storage::disk('public')->url($path);

            $this->info("Image successfully downloaded!");
            $this->info("Stored at: {$fullPath}");
            $this->info("Public URL: {$publicUrl}");

            return 0;
        } catch (\Exception $e) {
            $this->error("Error fetching image: " . $e->getMessage());
            return 1;
        }
    }
}
