<?php
use Illuminate\Support\Facades\Route;

use Modules\Products\App\Controllers\ProductsController;

/** Se definen los endpoints del módulo **/
Route::get('/products', [ProductsController::class, 'all'])->middleware(['auth:api', 'rol:admin,user']);
Route::get('/products/{id}', [ProductsController::class, 'productById'])->middleware(['auth:api', 'rol:admin,user']);
Route::get('/products/category/{categoryId}', [ProductsController::class, 'getProductByCategoryId'])->middleware(['auth:api', 'rol:admin,user']);
Route::post('/products', [ProductsController::class, 'create'])->middleware(['auth:api', 'rol:admin']);
Route::delete('/products/{id}',[ProductsController::class, 'delete'])->middleware(['auth:api', 'rol:admin']);
Route::put('/products/{id}',[ProductsController::class, 'update'])->middleware(['auth:api', 'rol:admin']);