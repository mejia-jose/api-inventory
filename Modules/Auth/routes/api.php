<?php

use Illuminate\Support\Facades\Route;

use Modules\Auth\App\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('/refresh', [AuthController::class, 'refreshToken'])->middleware('auth:api');