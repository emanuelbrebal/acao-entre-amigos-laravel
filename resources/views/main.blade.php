@extends('layouts.app')
@section('title', 'Ação Entre Amigos - Home Page')
<link rel="stylesheet" href="{{ asset('css/mainInicial.css') }}">
@section('content')
    <div class="d-flex main-search">
        <h1 class="main-text">Campanhas ativas</h1>
        <div class="input-svg-container">
            <form action="{{ route('buscar') }}" method="get">
                @csrf
                <input type="text" name="search-bar" id="search-bar" class="search-bar" value="{{ request('search-bar') }}">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                    <path fill="var(--grey)"
                        d="m479.6 399.716l-81.084-81.084l-62.368-25.767A175 175 0 0 0 368 192c0-97.047-78.953-176-176-176S16 94.953 16 192s78.953 176 176 176a175.03 175.03 0 0 0 101.619-32.377l25.7 62.2l81.081 81.088a56 56 0 1 0 79.2-79.195M48 192c0-79.4 64.6-144 144-144s144 64.6 144 144s-64.6 144-144 144S48 271.4 48 192m408.971 264.284a24.03 24.03 0 0 1-33.942 0l-76.572-76.572l-23.894-57.835l57.837 23.894l76.573 76.572a24.03 24.03 0 0 1-.002 33.941" />
                    </svg>
                </div>
                <button type="submit" class="search-button">Pesquisar</button>
            </form>
    </div>

    <section class="rifas-section">
        @if ($rifas->isEmpty())
            <p class="no-results">Nenhuma rifa encontrada.</p>
        @else
            @foreach ($rifas as $rifa)
                <div class="rifa-card">
                    <img class="img-card-rifa -individual" src="{{ asset('img/raffles/' . $rifa->imagem) }}"
                        alt="Imagem da Rifa">
                    <div class="rifa-info">
                        <h3 class="rifa-title">{{ $rifa->titulo_rifa }}</h3>
                        @if ($rifa->id_usuario_vencedor === null)
                            <p class="participacao">Rifa aceitando participações!</p>
                            <p>Valor do bilhete:
                                <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }} unid.</strong>
                            </p>
                            <p>Data do sorteio:
                                <strong> {{ \Carbon\Carbon::parse($rifa->data_sorteio)->format('d/m/Y') }} </strong>
                            </p>
                            <a href="{{ route('redirecionarRifa', ['id' => $rifa->id]) }}" class="search-button -more">PARTICIPAR</a>
                        @else
                            <p class="rifa-encerrada">Rifa encerrada!</p>
                            <p>Vencedor(a) {{ $rifa->user_vencedor->name }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </section>


    <script>


    </script>

@endsection
