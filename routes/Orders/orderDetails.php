<?php

use App\Http\Controllers\Order\OrderDetails\OrderDetailsController;
use Illuminate\Support\Facades\Route;

Route::controller(OrderDetailsController::class)
     ->group(function(){
        Route::post('order-details/', 'store')->middleware('auth:user_socialite,user');
        Route::post('order-details/{details_id}/{order_id}', 'update')->middleware('auth:primer_user');
        Route::delete('order-details/{id}', 'destroy')->middleware('auth:user_socialite,user');
        Route::get('order-details/{id}', 'show')->middleware('auth:primer_user');
        Route::get('my-order-details/', 'my_order')->middleware('auth:user_socialite,user');
        Route::get('order-details/same/day/{order_status_id}', 'same_day')->middleware('auth:primer_user');
        Route::get('order-details/befor/day/{order_status_id}', 'befor_day')->middleware('auth:primer_user');
        Route::get('order-details/search/{date}/{order_status_id}', 'search_date')->middleware('auth:primer_user');
        Route::get('bill/', 'bill')->middleware('auth:user_socialite,user');
        Route::get('orders-details-status/{order_status_id}', 'index')->middleware('auth:primer_user');
    });
