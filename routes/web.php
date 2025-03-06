<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return "Bienvenido al Dashboard"; 
})->name('dashboard')->middleware('auth');

Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::resource('productos', ProductoController::class);
});


