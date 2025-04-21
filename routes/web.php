<?php

use App\Http\Controllers\BreathingModeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
});

// Route accessible sans authentification
Route::get('/breathing-modes', [BreathingModeController::class, 'index'])->name('breathing-modes.index');
Route::get('/users', [UserController::class, 'index']);
Route::get('/categories',[CategoriesController::class, 'index'])->name('categories.index');
Route::resource('users', UserController::class);

// Routes nécessitant une authentification
// Route pour afficher le formulaire d'inscription
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');

// Route pour gérer l'inscription
Route::post('/register', [UserController::class, 'register'])->name('register');

// Route pour afficher le formulaire de connexion
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');

// Route pour gérer la connexion
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route pour gérer la déconnexion
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});