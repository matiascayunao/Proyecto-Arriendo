<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;


// Inicio/Home
Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/verificar',[UsuariosController::class,'verificar'])->name('usuarios.verficar');
Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
Route::get('/usuarios/contrasena',[UsuariosController::class,'contrasena'])->name('usuarios.contrasena');
Route::get('/usuarios/crear',[UsuariosController::class,'create'])->name('usuarios.create');
Route::get('usuarios/crearadmin',[UsuariosController::class,'createadmin'])->name('usuarios.createadmin');
Route::post('usuarios',[UsuariosController::class,'store'])->name('usuarios.store');
Route::post('usuarios/cambiarcontra', [UsuariosController::class, 'cambiocontra'])->name('usuarios.cambiarcontra');
route::get('usuarios/index',[UsuariosController::class,'index'])->name('usuarios.index');
route::delete('usuarios/{usuario}',[UsuariosController::class,'destroy'])->name('usuarios.destroy');
route::get('usuarios/{usuario}/edit',[UsuariosController::class,'edit'])->name('usuarios.edit');


