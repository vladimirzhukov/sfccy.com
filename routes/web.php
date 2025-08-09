<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [WebController::class, 'index'])->name('web::index');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('/login', [AuthController::class, 'signin'])->name('login');
    Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/auth/signup', [AuthController::class, 'doSignup'])->name('auth::signup');
    Route::post('/auth/signin', [AuthController::class, 'doLogin'])->name('auth::login');
    Route::post('/auth/forgot', [AuthController::class, 'doForgot'])->name('auth::forgot');
    Route::get('/confirm/{code}', [AuthController::class, 'confirm'])->name('confirm');
    Route::get('/reset/{code}', [AuthController::class, 'reset'])->name('reset');
    Route::post('/reset/set/{code}', [AuthController::class, 'doReset'])->name('auth::reset');
    Route::get('/login/google', [GoogleController::class, 'redirectToGoogle'])->name('auth::google');
    Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/terms', [WebController::class, 'terms'])->name('web::terms');
    Route::get('/privacy', [WebController::class, 'privacy'])->name('web::privacy');
});
