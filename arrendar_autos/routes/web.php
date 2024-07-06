<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ArriendosController;


// Inicio/Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::post('/usuarios/verificar', [UsuariosController::class, 'verificar'])->name('usuarios.verificar');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::get('/usuarios/contrasena', [UsuariosController::class, 'contrasena'])->name('usuarios.contrasena');
Route::get('/usuarios/crear', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::get('usuarios/crearadmin', [UsuariosController::class, 'createadmin'])->name('usuarios.createadmin');
Route::post('usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::post('usuarios/cambiarcontra', [UsuariosController::class, 'cambiocontra'])->name('usuarios.cambiarcontra');
Route::get('usuarios/index', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
Route::get('usuarios/{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');

// Vehículos
Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::get('/vehiculos/create', [VehiculosController::class, 'create'])->name('vehiculos.create');
Route::post('/vehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');
Route::get('/vehiculos/{vehiculo}/edit', [VehiculosController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/{vehiculo}', [VehiculosController::class, 'update'])->name('vehiculos.update');
Route::delete('/vehiculos/{vehiculo}', [VehiculosController::class, 'destroy'])->name('vehiculos.destroy');
Route::get('/vehiculos/{vehiculo}', [VehiculosController::class, 'show'])->name('vehiculos.show');

// Tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos.index');
Route::get('/tipos/create', [TiposController::class, 'create'])->name('tipos.create');
Route::post('/tipos', [TiposController::class, 'store'])->name('tipos.store');
Route::get('/tipos/{tipo}/edit', [TiposController::class, 'edit'])->name('tipos.edit');
Route::put('/tipos/{tipo}', [TiposController::class, 'update'])->name('tipos.update');
Route::delete('/tipos/{tipo}', [TiposController::class, 'destroy'])->name('tipos.destroy');

// Clientes
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

//Arriendos
Route::get('/arriendos', [arriendosController::class, 'index'])->name('arriendos.index');
Route::get('/arriendos/create', [arriendosController::class, 'create'])->name('arriendos.create');
Route::post('/arriendos', [arriendosController::class, 'store'])->name('arriendos.store');
Route::get('/arriendos/{arriendo}/edit', [arriendosController::class, 'edit'])->name('arriendos.edit');
Route::put('/arriendos/{arriendo}', [arriendosController::class, 'update'])->name('arriendos.update');
Route::delete('arriendos/{arriendo}', [arriendosController::class, 'destroy'])->name('arriendos.destroy');
Route::get('/arriendos/{arriendo}', [arriendosController::class, 'show'])->name('arriendos.show');





