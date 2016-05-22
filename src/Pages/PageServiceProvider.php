<?php

namespace LaravelFlare\Pages;

use LaravelFlare\Flare\FlareModuleProvider as ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // Migrations
        $this->publishes([
            __DIR__.'/Database/Migrations' => base_path('database/migrations'),
        ]);

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flare');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flare'),
        ]);
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->registerFlareHelpers();
    }

    /**
     * Register Flare Helper for Pages.
     */
    protected function registerFlareHelpers()
    {
        $this->flare->registerHelper('pages', \LaravelFlare\Pages\PageManager::class);
    }
}
