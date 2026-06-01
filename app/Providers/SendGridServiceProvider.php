<?php

namespace App\Providers;

use App\Services\SendGridService;
use Illuminate\Support\ServiceProvider;

class SendGridServiceProvider extends ServiceProvider
{
    /**
     * Register SendGrid service in the container
     */
    public function register(): void
    {
        $this->app->singleton(SendGridService::class, function ($app) {
            return new SendGridService();
        });
    }

    /**
     * Bootstrap SendGrid service
     */
    public function boot(): void
    {
        // Load SendGrid configuration
        $this->publishes([
            __DIR__ . '/../../config/sendgrid.php' => config_path('sendgrid.php'),
        ], 'config');
    }
}
