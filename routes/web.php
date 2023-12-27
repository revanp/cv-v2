<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::post('contact', [App\Http\Controllers\Frontend\IndexController::class, 'store']);
