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
                <p>Instituição responsável: <strong> {{ $instituicao->nome }} </strong></p>
                <p>Contato: <strong>{{ $instituicao->celular }}</strong></p>
                <p>Endereço: <strong>{{ $instituicao->endereco }}</strong></p>
            </div>

        </div>
        <div class="tabela-rifa">
            <h1 class="cotacao">cotas disponíveis abaixo:</h1>
            <table class="tabela-numeros">
                @for ($i = 1; $i <= min(100, $rifa->qtd_num); $i++)
                    @if ($i % 10 === 1)
                        <tr>
                    @endif

                    <td class="numero"> {{ $i }}</td>

                    @if ($i % 10 === 0 || $i === $rifa->qtd_num)
                        </tr>
                    @endif
                @endfor
            </table>
            <ul class="pagination-list">
                <li class="pagination">
                    <button class="page-decrement">Anterior</button>
                    <div id="pagination-container"></div>

                    <button class="page-increment">Próximo</button>
                </li>
            </ul>
            <a href="{{route('')}}" class="btn -comprar-cotas">Comprar cotas</a>
        </div>


    </section>

    <script>
        const offset = 100;
        const maxItems = 100; // Cada link mostra 100 números
        let paginationIndex = 0; // O índice da página
        const anterior = document.querySelector('.page-decrement');
        const proximo = document.querySelector('.page-increment');

        const paginationContainer = document.getElementById("pagination-container");
        const qtdNum = {{ $qtdNum }}; // A quantidade total de números
        const totalPages = Math.ceil(qtdNum / maxItems); // Calcula o total de páginas

        // Função para gerar links de paginação
        function gerarLinksPagina() {
            paginationContainer.innerHTML = ""; // Limpar o conteúdo atual

            // Calcular os intervalos de 3 links que serão exibidos
            const start = paginationIndex * 3 + 1;
            const end = Math.min(start + 2, totalPages); // Exibe até 3 links

            for (let i = start; i <= end; i++) {
                const link = document.createElement("a");
                link.classList.add("page-item");
                link.href = `#secao-${i}`;
                link.textContent =
                `${(i - 1) * maxItems + 1} - ${Math.min(i * maxItems, qtdNum)}`; // Texto do intervalo (exemplo: 1-100, 101-200)

                // Adicionar o link ao container
                paginationContainer.appendChild(link);
            }
        }

        // Função de controle de navegação
        anterior.addEventListener("click", function() {
            if (paginationIndex > 0) {
                paginationIndex--; // Navegar para a página anterior
                gerarLinksPagina();
            }
        });

        proximo.addEventListener("click", function() {
            if (paginationIndex < Math.floor(totalPages / 3)) {
                paginationIndex++; // Navegar para a próxima página
                gerarLinksPagina();
            }
        });

        // Inicializar os links de página ao carregar a página
        gerarLinksPagina();
    </script>
@endsection
