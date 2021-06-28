<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('user')->group(function () {
        Route::get('dashboard', \App\Http\Livewire\User\Dashboard::class )->name('user.dashboard');
        Route::get('address', \App\Http\Livewire\User\Address::class )->name('user.address');
        Route::get('profile', \App\Http\Livewire\User\Profile::class )->name('user.profile');
        Route::get('orders', \App\Http\Livewire\User\Orders::class )->name('user.orders');
    });
    Route::prefix('admin')->group(function () {
        Route::get('doctors', \App\Http\Livewire\Doctors::class)->name('admin.doctors');
        Route::get('users', \App\Http\Livewire\Users::class)->name('admin.users');
    });
});

