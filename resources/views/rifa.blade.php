@extends('layouts.rifas')
@section('title', 'Página da Rifa')
@section('content')
    <section class="rifa-controls">
        <div class="actions">
            <a href="javascript:void(0)" onclick="history.back()" class="btn -voltar"> <svg class="btn"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M21 12h-17.5" />
                        <path d="M3 12l7 7M3 12l7 -7" />
                    </g>
                </svg>
                voltar</a>

        </div>
    </section>

    <section class="rifa-infos">
        <div class="rifa-info -rifa-info-card">
            <img class="img-card-rifa -individual" src="{{ asset('img/raffles/' . $rifa->imagem) }}" alt="Imagem da Rifa">
            <h3 class="rifa-title">{{ $rifa->titulo_rifa }}</h3>
            <div class="info-sorteio">
                <p>Valor de cada cota: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                        unid.</strong></p>
                        <p>Quantidade de cotas: qtd de numeros - qtd de numeros comprados</p>
                        <p>Quantidade de cotas disponíveis: <strong>{{$rifa->qtd_num}}</strong></p>
                <p>Data do sorteio: <strong> {{ date('m/d/Y', strtotime($rifa->data_sorteio)) }} </strong></p>
                @if ($rifa->id_usuario_vendedor != null)
                    <p>Vencedor: <strong> {{ $rifa->id_usuario_vencedor }}</strong></p>
                @endif
            </div>
            <div class="info-instituicao">
                <p>Instituição responsável: <strong> {{ $instituicao->nome }} </strong></p>
                <p>Contato: <strong>{{ $instituicao->celular }}</strong></p>
                <p>Endereço: <strong>{{ $instituicao->endereco }}</strong></p>
            </div>

        </div>
        <div class="tabela-rifa">
            <h1 class="cotacao">cotas disponíveis abaixo:</h1>
            <div class="organiza-tabela">
                <table class="tabela-numeros" id="tabelaNumeros"> </table>
            </div>
            @if ($rifa->qtd_num > 100)
                <ul class="pagination-list">
                    <li class="pagination">
                        <button class="page-decrement">Anterior</button>
                        <div id="pagination-container"></div>
                        <button class="page-increment">Próximo</button>
                    </li>
                </ul>
            @endif
            <a href="{{ route('buyRaffleNumbers', ['id' => $rifa->id]) }}" class="btn -comprar-cotas">Comprar cotas</a>
        </div>


    </section>

    <script>
        const offset = 100;
        const maxItems = 100;
        let paginationIndex = 0;
        const anterior = document.querySelector('.page-decrement');
        const proximo = document.querySelector('.page-increment');

        const paginationContainer = document.getElementById("pagination-container");
        const qtdNum = {{ $qtdNum }};
        const totalPages = Math.ceil(qtdNum / maxItems);


        // function gerarLinksPagina() {
        //     paginationContainer.innerHTML = "";

        //     const start = paginationIndex * 3 + 1;
        //     const end = Math.min(start + 2, totalPages);

        //     for (let i = start; i <= end; i++) {
        //         const link = document.createElement("a");
        //         link.classList.add("page-item");
        //         link.href = `#`;
        //         link.textContent =
        //             `${(i - 1) * maxItems + 1} - ${Math.min(i * maxItems, qtdNum)}`;

        //         paginationContainer.appendChild(link);
        //     }
        // }
        let contPage = 0;

        function gerarTabela(paginationIndex) {
            const tabelaNumeros = document.getElementById("tabelaNumeros");
            tabelaNumeros.innerHTML = "";

            const start = paginationIndex * 100 + 1;
            const end = Math.min(start + 100, start + 99);

            let tableRow = document.createElement("tr");

            for (let i = start; i <= end; i++) {
                const tableData = document.createElement("td");
                tableData.classList.add("numero");
                tableData.textContent = i;

                tableRow.appendChild(tableData);

                if (i % 10 === 0 || i === end) {
                    tabelaNumeros.appendChild(tableRow);
                    tableRow = document.createElement("tr");
                }
            }
        }

        anterior.addEventListener("click", function() {
            if (paginationIndex > 0) {
                contPage--;
                paginationIndex--;
                gerarTabela(contPage);

            }
        });

        proximo.addEventListener("click", function() {
            if (paginationIndex < totalPages-1) {
                contPage++;
                paginationIndex++;
                gerarTabela(contPage);
            }
        });

        // gerarLinksPagina();
        gerarTabela(0);
    </script>
@endsection
