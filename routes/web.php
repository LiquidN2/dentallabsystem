<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::inertia('/', 'Dashboard')->name('dashboard');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    // Customers
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/{customer}/orders', [CustomerController::class, 'orders'])->name('customers.orders');

    // Orders
    Route::inertia('/orders', 'Orders/Index')->name('orders.index');
});

Route::prefix('products')->group(function () {
    Route::get('/', function () {
        return redirect('/products/items');
    });

    Route::get('/categories', [ProductCategoryController::class, 'index']);

    Route::get('/items', [ProductItemController::class, 'index']);
    Route::get('/items/create', [ProductItemController::class, 'create']);
    Route::post('/items', [ProductItemController::class, 'store']);
    Route::get('/items/{productItem}', [ProductItemController::class, 'show']);
    Route::get('/items/{productItem}/edit', [ProductItemController::class, 'edit']);
    Route::put('/items/{productItem}', [ProductItemController::class, 'update']);
    Route::delete('/items/{productItem}', [ProductItemController::class, 'destroy']);

})->middleware(['auth']);

include __DIR__.'/auth.php';

