<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)
    ->middleware('auth:primer_user')
    ->group(function(){
        Route::post('product/', 'store')->middleware('manage-product');
        Route::post('product/{id}', 'update')->middleware('manage-product');
        Route::delete('product/{id}', 'destroy')->middleware('manage-product');
        Route::get('products/requests', 'requests')->middleware('get-product-requests');
        Route::post('product/{id}/accept', 'accept')->middleware('get-product-requests');
        Route::get('products/{section_id}/{status_id}', 'filter_by_section_status');
        Route::get('product/{id}', 'show')->withoutMiddleware('auth:primer_user');
        Route::get('my-product/{id}', 'show_my_product');

        //User
        Route::get('public-products/{store_id}/{section_id}', 'public')->withoutMiddleware('auth:primer_user');
        Route::get('public-products-web/{store_id}/{section_id}', 'public_web')->withoutMiddleware('auth:primer_user');
        Route::get('all/products/{store_id}', 'all_products_for_store')->withoutMiddleware('auth:primer_user');


        // To Delete
        Route::get('product-by-section/{section_id}', 'filter_by_section');
        Route::get('product-by-status/{status_id}', 'filter_by_section_status');
        Route::get('my-products/', 'my_products');
       });


