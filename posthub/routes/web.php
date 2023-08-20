<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
})->name('index');

// Authentication
Route::prefix('auth')->middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('auth.forgot-password');
});

// Authentication: Logout
Route::prefix('auth')->middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout');
});

// Email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('index');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');