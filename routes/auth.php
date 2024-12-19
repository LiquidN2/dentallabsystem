<?php

use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\UserRegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');

    Route::get('/register', [UserRegistrationController::class, 'create'])->name('register.create');
    Route::post('/register', [UserRegistrationController::class, 'store'])->name('register.store');
});
