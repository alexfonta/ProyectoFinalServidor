<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::resource('events', EventController::class);

Route::resource('players', PlayerController::class);
