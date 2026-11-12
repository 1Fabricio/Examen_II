<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard',   fn () => view('dashboard'))->name('dashboard');
Route::get('/insumos',     fn () => view('insumos.index'))->name('insumos.index');
Route::get('/proveedores', fn () => view('proveedores.index'))->name('proveedores.index');
Route::get('/empleados',   fn () => view('empleados.index'))->name('empleados.index');

Route::post('/logout', fn () => redirect()->route('dashboard'))->name('logout');