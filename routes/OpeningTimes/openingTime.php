<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\OpeningTime\OpeningTimeController;

Route::controller(OpeningTimeController::class)
    ->middleware('auth:primer_user')
    ->group(function(){
        Route::middleware('add-store')->group(function (){
        Route::post('opening-time/', 'store');
        Route::post('opening-time/{id}', 'update');
        Route::delete('opening-time/{id}', 'destroy');
        Route::get('opening-time/{id}', 'show');
    });
        Route::get('opening-times/', 'index');
    });
