<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/userMe/{id}', [UserController::class, 'edit'])->name('userEdit', UserController::class);