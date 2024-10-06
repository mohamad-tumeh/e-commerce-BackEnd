<?php

use App\Http\Controllers\Permission\PermissionController;
use Illuminate\Support\Facades\Route;

Route::controller(PermissionController::class)
->middleware('auth:primer_user')->group(function(){

        Route::post('permission/', 'store');
        Route::post('permission/merchant/{primer_user_id}', 'store_for_merchant');
        Route::post('permission/{permission_id}/{primer_user_id}', 'update');
        Route::delete('permission/{permission_id}/{primer_user_id}', 'destroy');
        Route::get('permission/{id}', 'show');
        Route::get('permissions/', 'index');
});
