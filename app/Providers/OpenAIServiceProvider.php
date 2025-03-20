<?php

namespace App\Providers;

use App\Services\OpenAIService;
use Illuminate\Support\ServiceProvider;

class OpenAIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(OpenAIService::class, function ($app) {
            return new OpenAIService(
                config('openai.api_key'),
                config('openai.model'),
                config('openai.request_timeout')
            );
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
