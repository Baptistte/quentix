<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;

// Page d'accueil accessible à tous
Route::get('/', function () {
    return view('home');
})->name('home');

// Routes publiques (non protégées par le middleware 'auth')
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Routes protégées par 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
    Route::get('/sites/index', [SiteController::class, 'index'])->name('sites.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});