<?php

namespace Esatic\ActiveUser\Service;

use Esatic\ActiveUser\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use Esatic\ActiveUser\Http\Controllers\Admin\UserController;
use Esatic\ActiveUser\Http\Controllers\Admin\UserModuleController;

class Routes
{

    public static function admin()
    {
        Route::get('', [UserController::class, 'index']);
        Route::post('{user}/password', [UserController::class, 'changePassword']);
        Route::post('{user}/enable', [UserController::class, 'enable']);
        Route::get('{user}/modules', [UserModuleController::class, 'index']);
        Route::post('{user}/modules', [UserModuleController::class, 'store']);
    }

    public static function users(){
        Route::get('navigation', MenuController::class);
    }
}
