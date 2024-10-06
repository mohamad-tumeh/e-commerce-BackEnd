<?php

use App\Http\Controllers\Location\LocationController;
use Illuminate\Support\Facades\Route;

Route::controller(LocationController::class)
    ->middleware('auth:user_socialite,user')
    ->group(function(){

        Route::post('location/', 'store');
        Route::post('location/{id}', 'update');
        Route::delete('location/{id}', 'destroy');
        Route::get('location/{id}', 'show');
        Route::get('locations/', 'index');
    });
