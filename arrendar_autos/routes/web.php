<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\TiposController;


// Inicio/Home
Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/verificar',[UsuariosController::class,'verificar'])->name('usuarios.verficar');
Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
Route::get('/usuarios/contrasena',[UsuariosController::class,'contrasena'])->name('usuarios.contrasena');
Route::get('/usuarios/crear',[UsuariosController::class,'create'])->name('usuarios.create');
Route::get('usuarios/crearadmin',[UsuariosController::class,'createadmin'])->name('usuarios.createadmin');
Route::post('usuarios',[UsuariosController::class,'store'])->name('usuarios.store');
Route::post('usuarios/cambiarcontra', [UsuariosController::class,'cambiocontra'])->name('usuarios.cambiarcontra');
route::get('usuarios/index',[UsuariosController::class,'index'])->name('usuarios.index');
route::delete('usuarios/{usuario}',[UsuariosController::class,'destroy'])->name('usuarios.destroy');
route::get('usuarios/{usuario}/edit',[UsuariosController::class,'edit'])->name('usuarios.edit');
route::put('usuarios/{usuario}',[UsuariosController::class,'update'])->name('usuarios.update');


//vehiculos
Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::get('/vehiculos/create', [VehiculosController::class, 'create'])->name('vehiculos.create');
Route::post('/vehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');
Route::get('/vehiculos/{vehiculo}/edit', [VehiculosController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/{vehiculo}', [VehiculosController::class, 'update'])->name('vehiculos.update');
Route::delete('/vehiculos/{vehiculo}', [VehiculosController::class, 'destroy'])->name('vehiculos.destroy');
route::get('/vehiculos/{vehiculo}',[VehiculosController::class,'show'])->name('vehiculos.show');

//tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos.index');
Route::get('/tipos/create', [TiposController::class, 'create'])->name('tipos.create');
Route::post('/tipos', [TiposController::class, 'store'])->name('tipos.store');
Route::get('/tipos/{tipo}/edit', [TiposController::class, 'edit'])->name('tipos.edit');
Route::put('/tipos/{tipo}', [TiposController::class, 'update'])->name('tipos.update');

Route::delete('/tipos/{tipo}', [TiposController::class, 'destroy'])->name('tipos.destroy');




