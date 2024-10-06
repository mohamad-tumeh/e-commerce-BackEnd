<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {

    Route::post('logout-user', 'logout')->middleware('auth:user_socialite,user');
    Route::get('user/profile', 'profile_user')->middleware('auth:user_socialite,user');
    Route::post('user/profile/update', 'update_user')->middleware('auth:user_socialite,user');
    Route::get('primer-user/profile', 'profile_primer')->middleware('auth:primer_user');
    Route::post('primer-user/profile/update', 'update_primer')->middleware('auth:primer_user');
    Route::delete('primer/{id}', 'delete_primer')->middleware(['auth:primer_user','manage-admin','manage-merchant']);
    Route::get('primer/{id}', 'show_primer')->middleware(['auth:primer_user','manage-admin','manage-merchant']);
    Route::post('admin_merchant/update/{id}', 'update_admin_merchant')->middleware(['auth:primer_user','manage-admin','manage-merchant']);
    Route::post('logout-primer', 'logout')->middleware('auth:primer_user');
    Route::post('add-admin', 'add_primer_user')->middleware(['auth:primer_user', 'manage-admin']);
    Route::post('add-merchant', 'add_primer_user')->middleware(['auth:primer_user','manage-merchant']);
    Route::get('get-merchants', 'get_merchants')->middleware(['auth:primer_user', 'get-merchants']);
    Route::get('get-admins', 'get_admins')->middleware(['auth:primer_user', 'get-admins']);
    Route::get('get-users', 'get_users')->middleware(['auth:primer_user', 'get-users']);
    Route::post('change-password', 'change_password');
    Route::post('reset-password', 'reset_password');
    Route::post('reset-code', 'reset_code');
    Route::post('user/confirm', 'confirm')->middleware('auth:user_socialite,user');
    Route::post('user/add-phone-number', 'add_phone_number')->middleware('auth:user_socialite,user');
    Route::post('user/verify', 'verify')->middleware('auth:user_socialite,user');
    Route::post('user/{id}/blocked', 'block_user')->middleware(['auth:primer_user', 'get-users']);

});
