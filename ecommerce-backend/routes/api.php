<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Define CRUD routes for Product Management
Route::apiResource('products', ProductController::class);
Route::put('/products/{id}', [ProductController::class, 'update']);

