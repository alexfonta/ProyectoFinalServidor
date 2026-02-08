<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', IndexController::class)->name('index');

// Rutas de autenticación (solo para usuarios no autenticados)
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/signup', [UserController::class, 'showSignup'])->name('signup.show');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
});

// Rutas protegidas (solo para usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/account', [UserController::class, 'account'])->name('account');

    // Rutas de admin
    Route::middleware('admin')->group(function () {
        Route::get('/users', [UserController::class, 'list'])->name('users.list');
    });
});

// Recursos accesibles para autenticados
Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('players', PlayerController::class);
});

// Dónde estamos - mapa público
Route::get('/donde-estamos', [App\Http\Controllers\IndexController::class, 'where'])->name('where');
