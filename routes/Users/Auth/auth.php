<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('users')->group(function(){

    Route::post('login-user', 'login_user');
    Route::post('login-admin', 'login_admin');
    Route::post('login-merchant', 'login_merchant');
    Route::post('register', 'register');
    Route::post('register-web', 'register_web');

    // Google login For User
    // Route::get('login/google', 'redirectToGoogle');
    Route::post('login/socialate', '_registerOrLoginUser');
    // Facebook login For User
    // Route::get('login/facebook/','redirectToFacebook');
    // Route::get('login/facebook/callback', 'handleFacebookCallback');

});
