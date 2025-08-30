<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/calculadora_plano', [PlanoController::class, 'index'])->name('calculadora.index');
Route::get('/contratar', [VendaController::class, 'contratarForm']);

require __DIR__.'/auth.php';
