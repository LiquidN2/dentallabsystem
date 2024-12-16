<?php

use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\UserRegistrationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::inertia('/', 'Dashboard')->name('dashboard');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::resource('customers', CustomerController::class);
    Route::get('/customers/{customer}/orders', [CustomerController::class, 'orders'])->name('customers.orders');

    Route::inertia('/orders', 'Orders/Index')->name('orders.index');

    Route::get('/products', function() {
        return redirect('/products/items');
    });
    Route::resource('products/categories', ProductCategoryController::class);
    Route::resource('products/items', ProductItemController::class);

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');

    Route::get('/register', [UserRegistrationController::class, 'create'])->name('register.create');
    Route::post('/register', [UserRegistrationController::class, 'store'])->name('register.store');
});


