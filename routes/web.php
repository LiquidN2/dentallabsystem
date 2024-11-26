<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Dashboard')->name('dashboard');
Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

Route::inertia('/customers', 'Customers/Index')->name('customers.index');
Route::inertia('/orders', 'Orders/Index')->name('orders.index');
