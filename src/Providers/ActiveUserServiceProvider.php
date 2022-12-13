<?php

namespace Esatic\ActiveUser\Providers;

use Esatic\ActiveUser\Http\Middleware\UserCrmMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
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
        $this->addRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');
        $this->publishes([__DIR__ . '/../migrations/' => database_path('migrations')], 'user-crm');
        $this->publishes([__DIR__ . '/../config/user-crm.php' => config_path('user-crm.php')], 'user-crm');
        $this->mergeConfigFrom(__DIR__ . '/../config/user-crm.php', 'user-crm');
        $this->registerViews();

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('user-crm', UserCrmMiddleware::class);
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/users/');
        $sourcePath = __DIR__ . '/../views/';
        $this->publishes([$sourcePath => $viewPath], ['views', 'Esatic']);
        $this->publishes([__DIR__ . '/../config/user-crm.php' => config_path('user-crm.php')], 'user-crm');
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

    protected function addRoutes()
    {
        Route::middleware(['api', 'user-crm'])
            ->prefix('api')
            ->group(__DIR__ . '/../routes/routes.php');
    }
}
