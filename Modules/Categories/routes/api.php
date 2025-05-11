<?php

use Illuminate\Support\Facades\Route;

use Modules\Categories\App\Controllers\CategoriesController;

/** Se definen los endpoints del módulo **/
Route::get('/categories', [CategoriesController::class, 'all'])
->middleware(['auth:api', 'rol:admin,user', 'pagination']);

Route::get('/categories/{id}', [CategoriesController::class, 'categoryById'])
->middleware(['auth:api', 'rol:admin,user']);

Route::post('/categories', [CategoriesController::class, 'create'])
->middleware(['auth:api', 'rol:admin']);

Route::delete('/categories/{id}',[CategoriesController::class, 'delete'])
->middleware(['auth:api', 'rol:admin']);

Route::put('/categories/{id}',[CategoriesController::class, 'update'])
->middleware(['auth:api', 'rol:admin']);