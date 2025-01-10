@extends('layouts.rifas')
@section('title', 'Página da Rifa')
@section('content')
    <section class="rifa-controls">
        <div class="actions">
            <a href="javascript:void(0)" onclick="history.back()" class="btn -voltar"> <svg class="btn" xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M21 12h-17.5" />
                        <path d="M3 12l7 7M3 12l7 -7" />
                    </g>
                </svg>
                voltar</a>
            <a href="" class="btn -participar">participar</a>
        </div>
    </section>

    <section class="rifa-infos">
        <div class="rifa-info -rifa-info-card">
            <img class="img-card-rifa -individual" src="{{ asset('img/time_1000.jpg') }}" alt="">
            <h3 class="rifa-title">{{ $rifa->titulo_rifa }}</h3>
            <div class="info-sorteio">
                <p>Valor do bilhete: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                        unid.</strong></p>
                <p>Data do sorteio: <strong> {{ date('m/d/Y', strtotime($rifa->data_sorteio)) }} </strong></p>
                @if ($rifa->id_usuario_vendedor != null)
                    <p>Vencedor: <strong> {{ $rifa->id_usuario_vencedor }}</strong></p>
                @endif
            </div>
            <div class="info-instituicao">
                <p>Instituição responsável: <strong> {{ $rifa->id_instituicao }} </strong></p>
                <p>Contato: </p>
                <p>Endereço: </p>
            </div>

        </div>
        <div class="tabela-rifa">
            <h1 class="cotacao">cotas disponíveis abaixo:</h1>
            <table class="tabela-numeros">
                @for ($i = 1; $i <= $rifa->qtd_num; $i++)
                    @if ($i % 10 === 1)
                        <tr>
                    @endif

                    <td class="numero"> {{ $i }}</td>

                    @if ($i % 10 === 0 || $i === $rifa->qtd_num)
                        </tr>
                    @endif
                @endfor
            </table>
            <a href="" class="btn -comprar-cotas">Comprar cotas</a>
        </div>


    </section>

    <script>
        const numero = document.querySelector('.numero');
        numero.addEventListener() {

        }
    </script>
@endsection
