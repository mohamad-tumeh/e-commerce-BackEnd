<?php

use App\Http\Controllers\Product\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->middleware('auth:primer_user')->group(function(){
        Route::post('product/{product_id}/category/types', 'storeTypes')->middleware('manage-product');
        Route::post('category/{id}', 'update')->middleware('manage-product');
        Route::delete('category/{id}', 'destroy')->middleware('manage-product');
        Route::get('category/{id}', 'show')->withoutMiddleware('auth:primer_user');
        Route::get('categories/', 'index')->withoutMiddleware('auth:primer_user');
    });
