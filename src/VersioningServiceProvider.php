<?php

namespace NeonDigital\Versioning;

use Illuminate\Support\ServiceProvider;

class VersioningServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('versioning', function ($app) {
            return new VersionManager($app);
        });
    }
}
