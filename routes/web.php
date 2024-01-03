<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::get('cv', [App\Http\Controllers\Frontend\IndexController::class, 'cv']);
Route::post('contact', [App\Http\Controllers\Frontend\IndexController::class, 'store']);
