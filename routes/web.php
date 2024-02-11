<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::get('cv', [App\Http\Controllers\Frontend\IndexController::class, 'cv']);
Route::post('contact', [App\Http\Controllers\Frontend\IndexController::class, 'store']);
Route::post('portofolio-detail/{id}', [App\Http\Controllers\Frontend\IndexController::class, 'portofolioDetail']);

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

        Route::group(['prefix' => 'money-management'], function(){
            Route::group(['prefix' => 'bank-account'], function(){
                Route::get('', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'index']);
                Route::post('datatable', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'index']);
                Route::get('create', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'create']);
                Route::post('create', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'store']);
                Route::get('edit/{id}', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'edit']);
                Route::put('edit/{id}', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'update']);
                Route::put('change-status', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'changeStatus']);
                Route::get('delete/{id}', [App\Http\Controllers\Backend\MoneyManagement\BankAccountController::class, 'delete']);
            });

            Route::group(['prefix' => 'incoming-money'], function(){
                Route::get('', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'index']);
                Route::post('datatable', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'index']);
                Route::get('create', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'create']);
                Route::post('create', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'store']);
                Route::get('edit/{id}', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'edit']);
                Route::put('edit/{id}', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'update']);
                Route::get('delete/{id}', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'delete']);

                Route::get('get-category', [App\Http\Controllers\Backend\MoneyManagement\IncomingMoneyController::class, 'getCategory']);
            });
        });

        Route::group(['prefix' => 'form-contact-us'], function(){
            Route::get('', [App\Http\Controllers\Backend\FormContactUsController::class, 'index']);
            Route::post('datatable', [App\Http\Controllers\Backend\FormContactUsController::class, 'index']);
        });

        Route::group(['prefix' => 'settings'], function(){
            Route::group(['prefix' => 'users'], function(){
                Route::get('', [App\Http\Controllers\Backend\Settings\UsersController::class, 'index']);
                Route::post('datatable', [App\Http\Controllers\Backend\Settings\UsersController::class, 'index']);
                Route::get('create', [App\Http\Controllers\Backend\Settings\UsersController::class, 'create']);
                Route::post('create', [App\Http\Controllers\Backend\Settings\UsersController::class, 'store']);
                Route::get('edit/{id}', [App\Http\Controllers\Backend\Settings\UsersController::class, 'edit']);
                Route::put('edit/{id}', [App\Http\Controllers\Backend\Settings\UsersController::class, 'update']);
                Route::get('delete/{id}', [App\Http\Controllers\Backend\Settings\UsersController::class, 'delete']);
            });
        });
    });
});
