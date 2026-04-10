<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RentaController;
use App\Http\Controllers\ReportesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return response()->json(['message' => 'API Alquiladora funcionando']);
});


// =========================
// 🔐 AUTH
// =========================
Route::post('/login', [AuthController::class, 'login']);


// =========================
// 👤 USUARIOS
// =========================
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);


// =========================
// 🧑 CLIENTES
// =========================
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);


// =========================
// 📦 PRODUCTOS
// =========================
Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);


// =========================
// 📋 RENTAS
// =========================
Route::get('/rentas', [RentaController::class, 'index']);
Route::post('/rentas', [RentaController::class, 'store']);
Route::get('/rentas/{id}', [RentaController::class, 'show']);
Route::put('/rentas/{id}', [RentaController::class, 'update']);
Route::delete('/rentas/{id}', [RentaController::class, 'destroy']);


// =========================
// 📊 REPORTES
// =========================
Route::get('/reportes/rentas', [ReportesController::class, 'totalRentas']);
Route::get('/reportes/ingresos', [ReportesController::class, 'ingresosTotales']);
Route::get('/reportes/productos', [ReportesController::class, 'productos']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
