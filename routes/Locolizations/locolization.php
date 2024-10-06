<?php

use App\Http\Controllers\Language\LocolizationController;
use Illuminate\Support\Facades\Route;

Route::controller(LocolizationController::class)
    ->group(function(){
        Route::get('localization/product-status/{locale}', 'product_status');
        Route::get('localization/order-status/{locale}', 'order_status');
        Route::get('localization/cities/{locale}', 'cities');
        Route::get('localization/tags/{locale}', 'tags');
        Route::get('localization/permissions/{local}', 'permissions');
    });
