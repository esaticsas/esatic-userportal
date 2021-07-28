<?php

namespace Esatic\ActiveUser;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class ActiveUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
        $this->publishes([__DIR__ . '/config/esatic.php' => config_path('esatic.php')], 'Esatic');
        $this->mergeConfigFrom(__DIR__ . '/config/esatic.php', 'Esatic');
        $this->registerViews();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/users/');
        $sourcePath = __DIR__ . '/views/';
        $this->publishes([$sourcePath => $viewPath], ['views', 'Esatic']);
        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), 'Esatic');
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/users')) {
                $paths[] = $path . '/users';
            }
        }
        return $paths;
    }
}
