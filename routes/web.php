<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rutas públicas (solo invitados)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Rutas protegidas (solo usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('insumos', InsumoController::class)->except('show');
    Route::resource('proveedores', ProveedorController::class)
        ->parameters(['proveedores' => 'proveedor'])
        ->except('show');
    Route::resource('empleados', EmpleadoController::class);
});