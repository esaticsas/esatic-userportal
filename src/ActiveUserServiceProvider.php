<?php

namespace Esatic\ActiveUser;

use Illuminate\Support\ServiceProvider;

class ActiveUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
        $this->loadViewsFrom([__DIR__ . '/views/'], 'Esatic');
        $this->publishes([__DIR__ . '/config/esatic.php' => config_path('esatic.php')], 'Esatic');
        $this->mergeConfigFrom(__DIR__ . '/config/esatic.php', 'Esatic');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
