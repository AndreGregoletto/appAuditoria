<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavbarController;

Route::get('/', [NavbarController::class, 'index'])->name('navbarIndex');

Route::get('/getRag', [NavbarController::class, 'GetRag'])->name('navbarGetRag');

Route::get('/sendBalancete', [NavbarController::class, 'sendBalancete'])->name('navbarSendBalancete');
