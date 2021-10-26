<?php

use Illuminate\Support\Facades\Route;

Route::post('usercrm', [\Esatic\ActiveUser\Http\Controllers\ContactController::class, 'save']);
