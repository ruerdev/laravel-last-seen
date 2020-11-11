<?php

namespace Ruerdev\LaravelLastSeen;

use Illuminate\Support\ServiceProvider;

class LaravelLastSeenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-last-seen.php' => config_path('laravel-last-seen.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-last-seen.php', 'laravel-last-seen');
    }
}
