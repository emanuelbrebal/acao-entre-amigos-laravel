<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UsuarioController::class,'redirecionarHome'])->name('redirecionarHome');
Route::get('/signin', [UsuarioController::class, 'redirecionarRegistro'])->name('redirecionarRegistro');
Route::get('/login', [UsuarioController::class, 'redirecionarLogin'])->name('redirecionarLogin');

// Route::middleware('usuarioLogado')->controller(UsuarioController::class)->group(function () {

// });
