@extends('layouts.app')
@section('title', 'Ação Entre Amigos - Home Page')
<link rel="stylesheet" href="{{ asset('css/mainInicial.css') }}">
@section('content')
    <div class="d-flex main-search">
        <h1 class="main-text">Campanhas ativas</h1>
        <div class="input-svg-container">
            <input type="text" name="" id="" class="search-bar">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                <path fill="var(--grey)"
                    d="m479.6 399.716l-81.084-81.084l-62.368-25.767A175 175 0 0 0 368 192c0-97.047-78.953-176-176-176S16 94.953 16 192s78.953 176 176 176a175.03 175.03 0 0 0 101.619-32.377l25.7 62.2l81.081 81.088a56 56 0 1 0 79.2-79.195M48 192c0-79.4 64.6-144 144-144s144 64.6 144 144s-64.6 144-144 144S48 271.4 48 192m408.971 264.284a24.03 24.03 0 0 1-33.942 0l-76.572-76.572l-23.894-57.835l57.837 23.894l76.573 76.572a24.03 24.03 0 0 1-.002 33.941" />
            </svg>
        </div>
        <input type="button" value="Pesquisar" class="search-button">
    </div>

    <section class="rifas-section">
        @foreach ($rifas as $rifa)
            <div class="rifa-card">
                <img src="{{ asset('img/time_1000.jpg') }}" alt="" class="img-card-rifa">
                <div class="rifa-info">
                    <h3 class="rifa-title">{{ $rifa->titulo_rifa }}</h3>
                    @if ($rifa->id_usuario_vencedor === null)
                    <p>Rifa aceitando participações!</p>
                    <p>Valor do bilhete: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.')  }} unid.</strong></p>                    <p>Data do sorteio: <strong> {{ $rifa->data_sorteio }}</strong></p>
                    @else
                        <p class="rifa-encerrada">Rifa encerrada!</p>

                    @endif

                </div>
                <a href="{{Route('redirecionarRifa', ['id' => $rifa->id])}}" class="search-button -more">Saiba +</a>
            </div>
        @endforeach


    </section>

    <script>
        const barra_de_pesquisa = document.querySelector('.search-bar');
        const lupa = document.querySelector('.search-icon path');

        barra_de_pesquisa.addEventListener('focus', () => {
            lupa.setAttribute('fill', 'transparent');
        });

        barra_de_pesquisa.addEventListener('blur', () => {
            lupa.setAttribute('fill', 'var(--grey)');
        });
    </script>

@endsection
