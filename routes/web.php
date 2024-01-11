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
            Route::get('', [App\Http\Controllers\Backend\PortofolioController::class, 'index']);
            Route::post('datatable', [App\Http\Controllers\Backend\PortofolioController::class, 'index']);
            Route::get('create', [App\Http\Controllers\Backend\PortofolioController::class, 'create']);
            Route::post('create', [App\Http\Controllers\Backend\PortofolioController::class, 'store']);
            Route::get('edit/{id}', [App\Http\Controllers\Backend\PortofolioController::class, 'edit']);
            Route::put('edit/{id}', [App\Http\Controllers\Backend\PortofolioController::class, 'update']);
            Route::put('change-status', [App\Http\Controllers\Backend\PortofolioController::class, 'changeStatus']);
            Route::get('delete/{id}', [App\Http\Controllers\Backend\PortofolioController::class, 'delete']);
        });
    });
});
