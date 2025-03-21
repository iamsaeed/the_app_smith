<?php

namespace App\Providers;

use App\Services\LinkedInService;
use Illuminate\Support\ServiceProvider;

class LinkedInServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LinkedInService::class, function ($app) {
            return new LinkedInService(
                config('linkedin')
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/linkedin.php' => config_path('linkedin.php'),
        ]);
    }
}
