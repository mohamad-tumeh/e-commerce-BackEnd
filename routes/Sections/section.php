<?php


use App\Http\Controllers\Product\Section\SectionController;
use Illuminate\Support\Facades\Route;

Route::controller(SectionController::class)
    ->middleware('auth:primer_user')
    ->group(function(){
        Route::post('section/', 'store')->middleware('manage-product');
        Route::post('section/{id}', 'update')->middleware('manage-product');
        Route::delete('section/{id}', 'destroy')->middleware('manage-product');
        Route::get('sections/requests', 'requests')->middleware('get-product-requests');
        Route::post('section/{id}/accept', 'accept')->middleware('get-product-requests');
        Route::get('my-sections/', 'my_sections');
        Route::get('my-all-sections/', 'my_sections_without_paginate');
        Route::get('section/{store_id}/{id}', 'show')->withoutMiddleware('auth:primer_user');
        Route::get('public-sections/{store_id}', 'public')->withoutMiddleware('auth:primer_user');
    });

