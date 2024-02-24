<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::get('user', [App\Http\Controllers\Api\AuthController::class, 'user']);

    Route::group(['prefix' => 'incoming-money'], function(){
        Route::get('get-current-month', [App\Http\Controllers\Api\IncomingMoneyController::class, 'getCurrentMonth']);
    });
});
