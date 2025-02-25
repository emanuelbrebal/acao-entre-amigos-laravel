@extends('layouts.rifas')
@section('title', 'Minhas Cotas - Ação Entre Amigos')
@section('content')
    <div class="organiza-btns">

        <a href="{{ route('redirecionarHome') }}" class="btn -voltar"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                height="20" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M21 12h-17.5" />
                    <path d="M3 12l7 7M3 12l7 -7" />
                </g>
            </svg>
            voltar</a>
    </div>
    <ul class="titulo-my-quotas">
        <li>
            <h1>Minha carteira de cotas:</h1>
        </li>
    </ul>
    <section class="minhas-cotas rifas-section">
        @foreach ($rifasAtivadas as $idRifa => $numeros)
            @php
                $rifa = $numeros->first()->rifa;
            @endphp
            <a class="link-rifa" href="{{ route('redirecionarRifa', ['id' => $rifa->id]) }}">
                <div class="rifa-container {{ $rifa->ativado ? '-ativado' : '-desativado' }}">
                    <div class="rifa-top">
                        <div class="rifa-top-top">
                            <img class="rifa-icon" src="{{ asset('img/raffles/' . $rifa->imagem) }}" alt="Imagem da rifa">
                            <h3 class="rifa-title -quotas">Rifa: {{ $rifa->titulo_rifa }}</h3>
                        </div>
                        <div class="rifa-description">
                            <p>Data do sorteio:
                                <strong>{{ \Carbon\Carbon::parse($rifa->data_sorteio)->format('d/m/Y') }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="cotas">
                        <p>Cotas compradas: {{ $qtsComprei[$idRifa] }}</p>
                        <p>Chance de vitória: {{ $chancesVitoria[$idRifa] }}%</p>
                        <div class="caixa-numero {{ $rifa->ativado ? '' : '-num-desativados' }}">
                            @foreach ($numeros as $numero)
                                <div class="numero -show">{{ $numero->descricao }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </section>
    <ul class="titulo-my-quotas">
        <li>
            <h1>Rifas encerradas:</h1>
        </li>
    </ul>
    <section class="minhas-cotas rifas-section">
        @foreach ($rifasDesativadas as $idRifa => $numeros)
            @php
                $rifa = $numeros->first()->rifa;
            @endphp
            <div class="rifa-container {{ $rifa->ativado ? '-ativado' : '-desativado' }}">
                <div class="rifa-encerrada">
                    <div class="rifa-top">
                        <div class="rifa-top-top">
                            <img class="rifa-icon" src="{{ asset('img/raffles/' . $rifa->imagem) }}" alt="Imagem da rifa">
                            <h3 class="rifa-title -quotas">Rifa: {{ $rifa->titulo_rifa }}</h3>
                        </div>
                        <div class="rifa-description">
                            <p>Rifa encerrada! Muito obrigado por participar!</p>
                            <p><a class="form-a" href="{{ route('redirecionarHome') }}">Ver mais rifas disponíveis!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>



@endsection
