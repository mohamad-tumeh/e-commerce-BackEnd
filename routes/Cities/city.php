<?php

use App\Domain\Locations\Model\City;
use App\Http\Controllers\Location\CityController;
use Illuminate\Support\Facades\Route;

Route::controller(CityController::class)->middleware('auth:primer_user')
->group(function(){
    Route::middleware('manage-city')->group(function (){
        Route::post('city/', 'store');
        Route::post('city/{id}', 'update');
        Route::delete('city/{id}', 'destroy');
    });
    Route::get('city/{id}', 'show')->withoutMiddleware('auth:primer_user');
    Route::get('cities/', 'index')->withoutMiddleware('auth:primer_user');
});
