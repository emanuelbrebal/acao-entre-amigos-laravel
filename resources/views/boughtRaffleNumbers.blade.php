@extends('layouts.rifas')
@section('title', 'Minhas Cotas')
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
        <h1>Minha carteira de cotas:</h1>
    </div>
    <section class="minhas-cotas">
        @foreach ($numerosComprados as $idRifa => $numeros)
            <a class="link-rifa" href="{{ route('redirecionarRifa', ['id' => $numeros->first()->rifa->id]) }}">
                <div class="rifa-container">
                    <div class="rifa-top">
                        <div class="rifa-top-top">
                            <img class="rifa-icon" src="{{ asset('img/raffles/' . $numeros->first()->rifa->imagem) }}"
                                alt="Imagem da rifa">
                            <h3 class="rifa-title -quotas">Rifa: {{ $numeros->first()->rifa->titulo_rifa }}</h3>
                        </div>
                        <div class="rifa-description">
                            <p>Data do sorteio:
                                <strong> {{ \Carbon\Carbon::parse($numeros->first()->rifa->data_sorteio)->format('d/m/Y') }}
                                </strong>
                            </p>
                            {{-- <p class="rifa-encerrada">Rifa encerrada!</p>
                            <p>Vencedor(a) </p> --}}
                        </div>
                    </div>
                    <div class="cotas">
                        <p>Cotas compradas:</p>
                        <div class="caixa-numero">
                            @foreach ($numeros as $numero)
                                <div class="numero -show">
                                    {{ $numero->descricao }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </section>
    <script></script>
@endsection
