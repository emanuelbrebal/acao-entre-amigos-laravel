@extends('layouts.rifas')
@section('title', 'Minhas Cotas')
@section('content')

    <h1>Minha carteira de cotas:</h1>
    <section class="minhas-cotas">
        @foreach ($numerosComprados as $idRifa => $numeros)
            <a class="link-rifa" href="{{ route('redirecionarRifa', ['id' => $numeros->first()->rifa->id]) }}">
                <div class="rifa-container">
                    <div class="rifa-top">
                        <div class="rifa-top-top">
                            <img class="rifa-icon" src="{{ asset('img/raffles/' . $numeros->first()->rifa->imagem) }}"
                                alt="Imagem da rifa">
                            <h3 class="rifa-title">Rifa: {{ $numeros->first()->rifa->titulo_rifa }}</h3>
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
