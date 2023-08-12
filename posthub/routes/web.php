<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Landing page
Route::get('/', function () {
    return view('index');
});

// Authentication
Route::prefix('auth')->middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('auth.forgot-password');
});
