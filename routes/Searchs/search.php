<?php
use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Route;

Route::controller(SearchController::class)
    ->group(function () {
        Route::get('/search/{search}','search');
    });
