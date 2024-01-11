<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::get('cv', [App\Http\Controllers\Frontend\IndexController::class, 'cv']);
Route::post('contact', [App\Http\Controllers\Frontend\IndexController::class, 'store']);

Route::group(['prefix' => 'admin-cms'], function(){
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

    Route::group(['middleware' => 'auth'], function(){
        Route::get('', [App\Http\Controllers\Backend\DashboardController::class, 'index']);

        Route::group(['prefix' => 'portofolio'], function(){

        });
    });
});
