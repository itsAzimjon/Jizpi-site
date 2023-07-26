<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AppointController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LangController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('s', [PostController::class, 'index'])->name('h');
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/{locale}', [LangController::class, 'change_locale'])->name('change.locale');

Route::resource('welcome', WelcomeController::class);
Route::resource('posts', PostController::class);
Route::resource('ads', AdController::class);
Route::resource('appoint', AppointController::class);
Route::resource('events', EventController::class);


