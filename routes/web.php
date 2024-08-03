<?php

use App\Controllers\ProductController;
use Src\Http\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/add-product', [ProductController::class, 'create']);
Route::post('/add-product', [ProductController::class, 'store']);
Route::post('/delete-product', [ProductController::class, 'destroy']);