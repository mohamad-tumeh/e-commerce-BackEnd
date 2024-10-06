<?php

use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)
->middleware('auth:primer_user')
    ->group(function(){
        Route::post('store', 'store')->middleware('manage-store');
        Route::post('store/{id}', 'update')->middleware('manage-store');
        Route::delete('store/{id}', 'destroy')->middleware('manage-store');
        Route::get('my-store', 'my_store');
        Route::get('stores','index');
        Route::get('store/{id}', 'show')->withoutMiddleware('auth:primer_user');
        Route::get('public-stores/{language_id}', 'public')->withoutMiddleware('auth:primer_user');
    });
