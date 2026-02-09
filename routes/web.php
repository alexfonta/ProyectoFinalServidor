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
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

// Recursos accesibles para autenticados
Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class);

    // Rutas de jugadores que modifican datos solo para admin (DEBEN ESTAR ANTES de {player})
    Route::middleware('admin')->group(function () {
        Route::get('players/create', [PlayerController::class, 'create'])->name('players.create');
        Route::post('players', [PlayerController::class, 'store'])->name('players.store');
        Route::get('players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
        Route::put('players/{player}', [PlayerController::class, 'update'])->name('players.update');
        Route::delete('players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');
    });

    // Rutas de jugadores: index/show accesibles para cualquier usuario autenticado
    Route::get('players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('players/{player}', [PlayerController::class, 'show'])->name('players.show');
});

// Dónde estamos - mapa público
Route::get('/donde-estamos', [App\Http\Controllers\IndexController::class, 'where'])->name('where');
