<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [RedirectController::class,'redirecionarHome'])->name('redirecionarHome');
Route::get('/signin', [RedirectController::class, 'redirecionarRegistro'])->name('redirecionarRegistro');
Route::get('/login', [RedirectController::class, 'redirecionarLogin'])->name('redirecionarLogin');
Route::get('/rifa/{id}', [RedirectController::class, 'redirecionarRifa'])->name('redirecionarRifa');
Route::get('/buyNumbers/{id}', [RedirectController::class, 'buyRaffleNumbers'])->name('buyRaffleNumbers');
Route::post('/fazerRegistro', [RedirectController::class, 'redirecionarRegistro'])->name('fazerRegistro');
Route::get('/sobre', [RedirectController::class, 'redirecionarSobre'])->name('redirecionarSobre');
Route::get('/createRaffle', [RedirectController::class, 'redirecionarCreateRaffle'])->name('redirecionarCreateRaffle');

Route::get('/buscar', [RedirectController::class, 'redirecionarBusca'])->name('buscar');

// Route::middleware('usuarioLogado')->controller(UsuarioController::class)->group(function () {

// });
