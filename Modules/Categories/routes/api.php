<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Modules\Categories\App\Controllers\CategoriesController;

/** Se definen los endpoints del módulo **/
Route::get('/categories/all', [CategoriesController::class, 'all'])->middleware(['auth:api', 'rol:admin']);