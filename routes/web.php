<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::controller(RedirectController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/home', 'redirecionarHome')->name('redirecionarHome');
    Route::get('/signin', 'redirecionarRegistro')->name('redirecionarRegistro');
    Route::get('/login', 'redirecionarLogin')->name('redirecionarLogin');
    Route::get('/rifa/{id}', 'redirecionarRifa')->name('redirecionarRifa');
    Route::get('/buyNumbers/{id}', 'buyRaffleNumbers')->name('buyRaffleNumbers');
    Route::get('/sobre', 'redirecionarSobre')->name('redirecionarSobre');
    Route::get('/createRaffle', 'redirecionarCreateRaffle')->name('redirecionarCreateRaffle');
    Route::get('/buscar', 'redirecionarBusca')->name('buscar');
});

// Route::middleware('usuarioLogado')->controller(UsuarioController::class)->group(function () {

// });

Route::controller(LoginController::class)->group(function(){
    Route::post('/criarRegistro', 'criarRegistro')->name('criarRegistro');
    Route::post('/fazerLogin', 'fazerLogin')->name('fazerLogin');
    Route::post('/logout', 'fazerLogout')->name('fazerLogout');

});
Route::post('/createRaffle/store', [RifaController::class, 'store'])->name('cadastrarRifa');

