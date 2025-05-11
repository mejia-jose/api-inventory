<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Users\App\Controllers\UsersController;

/** Se definen los endpoints del módulo **/
Route::get('/user/all', [UsersController::class, 'all'])->middleware(['auth:api', 'rol:admin']);
Route::post('/user/register', [UsersController::class, 'register'])->middleware(['auth:api']);