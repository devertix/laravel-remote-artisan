<?php

namespace Devertix\LaravelRemoteArtisan;

use Illuminate\Support\ServiceProvider;
class LaravelRemoteArtisanProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-remote-artisan.php', 'laravel-remote-artisan');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-remote-artisan.php' => config_path('laravel-remote-artisan.php'),
        ]);
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
