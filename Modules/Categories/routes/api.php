<?php

use Illuminate\Support\Facades\Route;

use Modules\Categories\App\Controllers\CategoriesController;

/** Se definen los endpoints del módulo **/
Route::get('/categories/all', [CategoriesController::class, 'all'])->middleware(['auth:api', 'rol:admin,user']);
Route::get('/categories/{id}', [CategoriesController::class, 'categoryById'])->middleware(['auth:api', 'rol:admin,user']);
Route::post('/categories/create', [CategoriesController::class, 'create'])->middleware(['auth:api', 'rol:admin']);
