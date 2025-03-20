<?php

namespace App\Providers;

use App\Services\UnsplashService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class UnsplashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UnsplashService::class, function ($app) {
            $config = config('services.unsplash');
            Log::info('UnsplashServiceProvider: Registering with config: ' . json_encode($config));

            if (empty($config)) {
                Log::warning('UnsplashServiceProvider: No configuration found in services.unsplash');
                // Provide a fallback configuration with the access key from .env
                $config = [
                    'access_key' => env('UNSPLASH_ACCESS_KEY'),
                    'per_page' => 5,
                    'orientation' => 'landscape',
                ];
                Log::info('UnsplashServiceProvider: Using fallback config: ' . json_encode($config));
            }

            return new UnsplashService($config);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
