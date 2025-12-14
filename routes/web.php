<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

// Registration Routes
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProcess']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout']);

// Protected Dashboard Route
Route::get('/', function () {
    return "Dashboard";
})->middleware('auth');

