<?php

use App\Http\Controllers\Evaluation\EvaluationController;
use Illuminate\Support\Facades\Route;

Route::controller(EvaluationController::class)
    ->group(function(){
        Route::middleware('auth:user_socialite,user')->group(function (){
            Route::post('evaluation/', 'store');
            Route::post('evaluation/{id}', 'update');
            Route::delete('evaluation/{id}', 'destroy');
        });
        Route::get('evaluations/', 'index')->middleware(['auth:primer_user','get-evaluations']);
    });
