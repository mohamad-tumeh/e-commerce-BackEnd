<?php

use App\Http\Controllers\Helper\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::controller(StatisticsController::class)
    ->middleware('auth:primer_user')
    ->group(function()
    {
        Route::get('total-sales', 'total_sales')->middleware('merchant-statistics');
        Route::get('delivered-orders', 'delivered_orders')->middleware('merchant-statistics');
        Route::get('daily-orders', 'daily_orders')->middleware('merchant-statistics');
        Route::get('count-store', 'count_store')->middleware('admin-statistics');
        Route::get('count-user', 'count_user')->middleware('admin-statistics');
        Route::get('count-order', 'count_order')->middleware('admin-statistics');
    });
