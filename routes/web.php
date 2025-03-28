<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::controller(RedirectController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/home', 'redirecionarHome')->name('redirecionarHome');
    Route::get('/', 'redirecionarHome')->name('redirecionarDefault');
    Route::get('/rifa/{id}', 'redirecionarRifa')->name('redirecionarRifa');
    Route::get('/sobre', 'redirecionarSobre')->name('redirecionarSobre');
    Route::get('/createRaffle', 'redirecionarCreateRaffle')->name('redirecionarCreateRaffle');
    Route::get('/buscar', 'redirecionarBusca')->name('buscar');
});

Route::controller(RedirectController::class)->group(function () {
    Route::get('/login', 'redirecionarLogin')->name('redirecionarLogin');
    Route::get('/signin', 'redirecionarRegistro')->name('redirecionarRegistro');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/criarRegistro', 'criarRegistro')->name('criarRegistro');
    Route::post('/fazerLogin', 'fazerLogin')->name('fazerLogin');
    Route::post('/logout', 'fazerLogout')->name('fazerLogout');
});

Route::controller(RifaController::class)->middleware('usuarioLogado')->group(function () {
    Route::post('/createRaffle/store', 'store')->name('cadastrarRifa');
    Route::post('/buyRaffleNumbers', 'buyRaffleNumbers')->name('buyRaffleNumbers');
    Route::get('/boughtRaffleNumbers', 'boughtRaffleNumbers')->name('boughtRaffleNumbers');
});

Route::controller(UsuarioController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/listarUsuario', 'listarUsuario')->name('listarUsuario');
    Route::post('/updateUsuario', 'updateUsuario')->name('updateUsuario');
});

Route::controller(InstituicaoController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/listMyRaffles', 'listMyRaffles')->name('listMyRaffles');
    Route::get('/updateMyRaffles/{id}', 'updateMyRaffles')->name('updateMyRaffles');
    Route::post('/editarRifa/{id}', 'editarRifa')->name('editarRifa');
    Route::get('/desativarRifa/{id}', 'desativarRifa')->name('desativarRifa');
    Route::get('/ativarRifa/{id}', 'ativarRifa')->name('ativarRifa');

    Route::get('/listarInstituicao', 'listarInstituicao')->name('listarInstituicao');
    Route::post('/updateInstituicao', 'updateInstituicao')->name('updateInstituicao');
});
