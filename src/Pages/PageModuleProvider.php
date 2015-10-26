<?php

namespace LaravelFlare\Pages;

class PageModuleProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
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
