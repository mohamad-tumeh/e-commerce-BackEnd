<?php

use App\Http\Controllers\Elanat\ElanatController;
use Illuminate\Support\Facades\Route;

Route::controller(ElanatController::class)
->group(function(){

        Route::post('elanat/', 'store')->middleware(['auth:primer_user', 'manage-ads']);
        Route::post('elanat/{id}', 'update')->middleware(['auth:primer_user', 'manage-ads']);
        Route::delete('elanat/{id}', 'destroy')->middleware(['auth:primer_user', 'manage-ads']);
        Route::get('elanat/{id}', 'show');
        Route::get('elanats/', 'index');
});
