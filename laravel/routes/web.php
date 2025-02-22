<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/import', [TestController::class, 'getFileXls'])->name('import');

Route::get('/test', function () {	
    return view('components.layout-default');
});

Route::middleware('auth')->group(function () {
    
    require_once __DIR__ . '/navbar.php';
});

require_once __DIR__ . '/auth.php';