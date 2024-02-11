<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::get('user', [App\Http\Controllers\Api\AuthController::class, 'user']);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
