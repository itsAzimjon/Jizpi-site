<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AppointController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FirstnavController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SecondnavController;
use App\Http\Controllers\ThirdnavController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('posts', [PostController::class, 'index'])->name('posts');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/{locale}', [LangController::class, 'change_locale'])->name('change.locale');


Route::resource('welcome', WelcomeController::class);
Route::resource('posts', PostController::class);
Route::resource('ads', AdController::class);
Route::resource('appoint', AppointController::class);
Route::resource('events', EventController::class);
Route::resource('firstnavs', FirstnavController::class);
Route::resource('secondnavs', SecondnavController::class);
Route::resource('thirdnavs', ThirdnavController::class);


Route::get('thirdnavs/create/{thirdnav}', [ThirdnavController::class, 'build'])->name('thirdnavs.build');



