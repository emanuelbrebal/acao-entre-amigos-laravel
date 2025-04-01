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
    Route::get('/create-raffle', 'redirecionarCreateRaffle')->name('redirecionarCreateRaffle');
    Route::get('/buscar', 'redirecionarBusca')->name('buscar');
});

Route::controller(RedirectController::class)->group(function () {
    Route::get('/login', 'redirecionarLogin')->name('redirecionarLogin');
    Route::get('/signin', 'redirecionarRegistro')->name('redirecionarRegistro');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/criar-registro', 'criarRegistro')->name('criarRegistro');
    Route::post('/fazer-login', 'fazerLogin')->name('fazerLogin');
    Route::post('/logout', 'fazerLogout')->name('fazerLogout');
});

Route::controller(RifaController::class)->middleware('usuarioLogado')->group(function () {
    Route::post('/create-raffle/store', 'store')->name('cadastrarRifa');
    Route::post('/buy-raffle-numbers', 'buyRaffleNumbers')->name('buyRaffleNumbers');
    Route::get('/bought-raffle-numbers', 'boughtRaffleNumbers')->name('boughtRaffleNumbers');
});

Route::controller(UsuarioController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/listar-usuario', 'listarUsuario')->name('listarUsuario');
    Route::post('/update-usuario', 'updateUsuario')->name('updateUsuario');
});

Route::controller(InstituicaoController::class)->middleware('usuarioLogado')->group(function () {
    Route::get('/list-my-raffles', 'listMyRaffles')->name('listMyRaffles');
    Route::get('/update-my-raffles/{id}', 'updateMyRaffles')->name('updateMyRaffles');
    Route::post('/editar-rifa/{id}', 'editarRifa')->name('editarRifa');
    Route::get('/desativar-rifa/{id}', 'desativarRifa')->name('desativarRifa');
    Route::get('/ativar-rifa/{id}', 'ativarRifa')->name('ativarRifa');

    Route::get('/listar-instituicao', 'listarInstituicao')->name('listarInstituicao');
    Route::post('/update-instituicao', 'updateInstituicao')->name('updateInstituicao');
});
