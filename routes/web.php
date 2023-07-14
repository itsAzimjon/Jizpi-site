<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;


Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('s', [PostController::class, 'index'])->name('h');

Route::resource('welcome', WelcomeController::class);

Route::resource('posts', PostController::class);