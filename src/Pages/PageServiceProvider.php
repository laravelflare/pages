<?php

namespace LaravelFlare\Pages;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    { 
        $this->publishes([
            __DIR__.'/Database/Migrations' => base_path('database/migrations'),
        ]);
        
        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flare');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flare'),
        ]);

        $this->registerBladeOperators();
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->registerServiceProviders();
    }

    /**
     * Register Service Providers.
     */
    protected function registerServiceProviders()
    {
    }

    /**
     * Register Blade Operators.
     */
    protected function registerBladeOperators()
    {
    }
}
