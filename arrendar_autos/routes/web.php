<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Inicio/Home
Route::get('/',[HomeController::class,'index'])->name('home.index')->middleware('auth');



Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/verificar',[UsuariosController::class,'verificar'])->name('usuarios.verficar');

