<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSpaceController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\SiteSolutionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\JenkinsController;

// Page d'accueil accessible à tous
Route::get('/', function () {
    return view('home');
})->name('home');

// Routes publiques (non protégées par le middleware 'auth')
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/wordpress_presentation', [SiteSolutionController::class, 'wordpress'])->name('solutions.wordpress');

Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');


// Routes protégées par 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
    Route::get('/sites/index', [SiteController::class, 'index'])->name('sites.index');
    Route::post('/sites/store', [SiteController::class, 'store'])->name('sites.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/connected_user_space',[UserSpaceController::class, 'index'])->name('user.space');   
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe'); 

    Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])->middleware('auth')->name('purchase.history');
    Route::post('/jenkins/trigger', [JenkinsController::class, 'triggerJob'])->name('jenkins.trigger');
});