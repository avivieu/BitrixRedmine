<?php

namespace avivieu\bitrixRedmine;

use Illuminate\Support\ServiceProvider;

class bitrixRedmineServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([   __DIR__.'/config/redmine.php' => config_path('redmine.php')], 'config');
        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
        include_once __DIR__."/Http/routes.php";
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/redmine.php', 'redmine'
        );
    }
}