<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Inicio/Home
Route::get('/',[HomeController::class,'index'])->name('master.template');
