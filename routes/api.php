<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Registro del recurso para la API
Route::apiResource('productos', ProductoController::class);

// Ruta por defecto para consultar el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');