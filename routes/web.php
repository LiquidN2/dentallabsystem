<?php

use App\Http\Controllers\Auth\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Dashboard')->name('dashboard');
Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

Route::inertia('/customers', 'Customers/Index')->name('customers.index');
Route::inertia('/orders', 'Orders/Index')->name('orders.index');

//Route::inertia('/login', 'Auth/Login')->name('login');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
