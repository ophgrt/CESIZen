<?php

use App\Http\Controllers\BreathingModeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route accessible sans authentification
Route::get('/breathing-modes', [BreathingModeController::class, 'index'])->name('breathing-modes.index');

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});