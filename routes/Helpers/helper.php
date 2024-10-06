<?php

use App\Http\Controllers\Helper\HelperController;
use Illuminate\Support\Facades\Route;

Route::controller(HelperController::class)
    ->middleware('auth:primer_user')
    ->group(function () {
        Route::get('order-statuses', 'get_order_statuses');
        Route::get('product-statuses', 'get_product_statuses');
        Route::get('store-statuses', 'get_store_statuses');
        Route::get('tags', 'get_tags');
        Route::get('languages', 'get_languages')->withoutMiddleware('auth:primer_user');
        Route::get('types-notification', 'get_types')->middleware('manage-notification');
        Route::get('notifications', 'get_notifications')->middleware('manage-notification');
        Route::post('notification/{id}', 'update')->middleware('manage-notification');
        Route::get('user-types', 'get_user_types');
    });
