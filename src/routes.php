<?php

use Illuminate\Support\Facades\Route;

Route::post('usercrm', [\Esatic\ActiveUser\Controllers\ContactController::class, 'save']);
