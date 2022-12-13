# User Crm

## Add security

In your service provider push the middleware **user-crm** to your middleware authentication for security
integrations

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('user-crm', 'auth:api');//Your user middleware
        $router->pushMiddlewareToGroup('administrator-crm','auth:admin'); //Your admin middleware
    }
}
```

##  Add custom auth admin with model Esatic\ActiveUser\Models\Administrator

Create your model extending from **Esatic\ActiveUser\Models\Administrator** "Example using passport"

```php
<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;

class Administrator extends \Esatic\ActiveUser\Models\Administrator
{

    use  HasApiTokens;
}
```


in your file **config/auth.php** put the content

```php
...
'guards' => [
    'admin' => [
        'driver' => 'passport',
        'provider' => 'admin',
    ],
]
...
'providers' => [
    ...
    'admin' => [
        'driver' => 'eloquent',
        'model' => App\Models\Administrator::class
    ]
    ...
]
```
