@extends('layouts.app')
@section('title', 'Ação Entre Amigos - Home Page')
<link rel="stylesheet" href="{{ asset('css/mainInicial.css') }}">
@section('content')
    <div class="d-flex main-search">
        <h1 class="main-text">Campanhas ativas</h1>
        <input type="text"  name="" id="" class="search-bar">
        <input type="button" value="Pesquisar" class="search-button">
    </div>

    <section class="rifas-section">
        {{-- @foreach ($rifas as $rifa)
        @endforeach --}}
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>
        <div class="rifa-card">
            <img src="{{asset('img/time_1000.jpg')}}" alt="" class="img-card-rifa">
            <h3>instituicao->nome</h3>
            <p>Valor do bilhete: R$ preco_numero</p>
            <p>Data do sorteio: data_sorteio</p>
            <a href="" class="search-button -more">Saiba +</a>
        </div>

    </section>

@endsection
