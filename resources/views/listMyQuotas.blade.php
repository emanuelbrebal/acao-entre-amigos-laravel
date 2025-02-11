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
    </div>
    <ul class="titulo-my-quotas">
        <li>
            <h1>Rifas de <strong>{{ $instituicaoLogada->nome }}:</strong></h1>
        </li>
    </ul>
    <section class="minhas-cotas">
        @foreach ($minhasRifas as $idRifa => $numeros)
            <div class="rifa-container">
                <div class="rifa-top">
                    <div class="rifa-top-top">
                        <img class="rifa-icon" src="{{ asset('img/raffles/' . $numeros->imagem) }}" alt="Imagem da rifa">
                        <h3 class="rifa-title -quotas">Rifa: {{ $numeros->titulo_rifa }}</h3>
                    </div>
                    <p>Data do sorteio:
                        <strong> {{ \Carbon\Carbon::parse($numeros->data_sorteio)->format('d/m/Y') }}
                        </strong>
                    </p>
                    <p>Números:</p>
                    <div class="rifa-description -raffle-list">
                        <p>
                            Comprados: {{ $numerosTotais[$numeros->id]->total ?? 0 }}
                        </p>
                        <progress class="progress" max="{{ $qtdTotais[$numeros->id] }}"
                            value="{{ $numerosTotais[$numeros->id]->total ?? 0 }}"> </progress>
                        <p>
                            Totais: {{ $qtdTotais[$numeros->id] }}
                        </p>
                    </div>
                    <p>Valor por cota: R$<strong>{{ number_format($valorCotas->get($numeros->id) ?? 0, 2, ',', '.') }} </strong></p>

                    <p>Total arrecadado: R$<strong>{{ number_format(($valorCotas->get($numeros->id) ?? 0) * ($numerosTotais->get($numeros->id)?->total ?? 0), 2, ',', '.') }} </strong>
                    </p>

                    <div class="options">
                        <a class="btn btn-secondary" href="{{ route('redirecionarRifa', ['id' => $numeros->id]) }}">Ver
                            Rifa</a>
                        <a type class="btn btn-primary">Editar Rifa</a>
                        <a type class="btn btn-danger">Desativar Rifa</a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <script></script>
@endsection
