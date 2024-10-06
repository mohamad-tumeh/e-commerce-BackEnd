<?php

use App\Http\Controllers\Faq\FaqController;
use Illuminate\Support\Facades\Route;

Route::controller(FaqController::class)->group(function () {
    Route::post('faq/', 'store');
    Route::post('faq/{id}', 'update');
    Route::delete('faq/{id}', 'destroy');
    Route::get('faq/{id}', 'show');
    Route::get('faqs/', 'index');
});
