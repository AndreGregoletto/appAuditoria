<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'getLogin'])->name('loginView');

Route::post('/loginSubmit', [LoginController::class, 'loginValidation'])->name('loginSubmit');

Route::get('/createLogin', [LoginController::class, 'getCreateLogin'])->name('createLoginView');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('/user', UserController::class);