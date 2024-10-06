<?php

use App\Http\Controllers\Product\Type\TypeController;
use Illuminate\Support\Facades\Route;

Route::controller(TypeController::class)
    ->middleware('auth:primer_user')->group(function(){
        Route::post('type/{category_id}', 'storeInCategory')->middleware('manage-product');
        Route::post('type/{id}', 'update')->middleware('manage-product');
        Route::delete('type/{id}', 'destroy')->middleware('manage-product');
        Route::get('type/{id}', 'show');
        Route::get('types/', 'index');
    });
