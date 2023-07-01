<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// initial
Route::get('/', function () {
    return view('auth.auth');
});

//auth controller
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// dashboard
Route::get('/dashboard', function () {
    return view('main.dashboard');
});

//register
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');