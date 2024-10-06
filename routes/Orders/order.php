<?php

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(OrderController::class)
    ->group(function(){

        Route::post('order/', 'store')->middleware('auth:user_socialite,user');
        Route::post('order/{id}', 'update')->middleware('auth:primer_user');
        Route::delete('order/{id}', 'destroy')->middleware('auth:user_socialite,user');
        Route::get('order/{id}', 'show')->middleware('auth:user_socialite,user');
        Route::get('orders/', 'index')->middleware('auth:user_socialite,user');
    });
