<?php

use App\Http\Controllers\PlanoController;
use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/calcular_plano', [PlanoController::class, 'calcular']);
Route::post('/contratar', [VendaController::class, 'contratar']);
