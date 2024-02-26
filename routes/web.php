<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\PetugasOnly;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function (){
    Route::get('login', 'show_login')->name('login.show');
    Route::post('login', 'store_login')->name('login.store');
    Route::get('logout', 'logout')->name('logout');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::middleware(AdminOnly::class)->group(function (){
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function (){
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('{id}', 'destroy')->name('destroy');
        });

        Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function (){
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('edit/{id}', 'edit')->name('edit');

            Route::post('', 'store')->name('store');
            Route::patch('', 'update')->name('update');
            Route::get('delete/{id}', 'destroy')->name('destroy');

            Route::get('list', 'list')->name('list');
        });

        Route::controller(CustomerController::class)->prefix('customer')->name('customer.')->group(function (){
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('edit/{id}', 'edit')->name('edit');

            Route::post('', 'store')->name('store');
            Route::patch('', 'update')->name('update');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
    });

    Route::controller(TransactionController::class)->middleware(PetugasOnly::class)->name('transaction.')->group(function (){
        Route::get('', 'index')->name('index');
        Route::prefix('transaction')->group(function(){
            Route::post('', 'store')->name('store');
            Route::get('history', 'history')->name('history');
            Route::get('history/{id}', 'details')->name('details');
        });
    });
});
