<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Маршруты для админки
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Публичная часть
Route::get('/', function () {
    return view('welcome');
});
