<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/detail/{product}', [ProductController::class, 'detail']);
Route::post('/products/{product}/update', [ProductController::class, 'update']);
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy']);
Route::get('/products/register', [ProductController::class, 'register']);
Route::post('/products/register', [ProductController::class, 'create']);
Route::get('/products/search', [ProductController::class, 'search']);