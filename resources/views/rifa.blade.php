@extends('layouts.rifas')
@section('title', 'Página da Rifa')
@section('content')

    <section class="rifa-infos">
        <div class="rifa-info -rifa-info-card">
            <a href="{{ route('redirecionarHome') }}" class="btn -voltar"> <svg class="btn"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M21 12h-17.5" />
                        <path d="M3 12l7 7M3 12l7 -7" />
                    </g>
                </svg>
                voltar</a>
            <h1 class="">Informações da rifa:</h1>
            <img class="img-card-rifa -individual" src="{{ asset('img/raffles/' . $rifa->imagem) }}" alt="Imagem da Rifa">
            <h3 class="rifa-title">{{ $rifa->titulo_rifa }}</h3>
            <div class="info-sorteio">
                <p>Valor por cota: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                        unid.</strong></p>
                <p>Total de cotas: <strong>{{ $rifa->qtd_num }}</strong></p>
                <p>Cotas disponíveis: <strong>{{ $rifa->qtd_num }}</strong></p>
                <p>Data do sorteio: <strong> {{ date('m/d/Y', strtotime($rifa->data_sorteio)) }} </strong></p>
                @if ($rifa->id_usuario_vendedor != null)
                    <p>Vencedor: <strong> {{ $rifa->id_usuario_vencedor }}</strong></p>
                @endif
            </div>

            <div class="info-instituicao">
                <p>Instituição: <strong> {{ $instituicao->nome }} </strong></p>
                <p>CNPJ: <strong>{{ $instituicao->cnpj }}</strong></p>
                <p>E-mail: <strong>{{ $instituicao->email }}</strong></p>
                <p>Endereço: <strong>{{ $instituicao->endereco }}</strong></p>
                <p>Contato: <strong>{{ $instituicao->celular }}</strong></p>
            </div>

        </div>
        <div class="tabela-rifa">
            <h1 class="cotacao">Cotas disponíveis abaixo:</h1>
            <form action="{{ route('buyRaffleNumbers') }}" method="POST" id="form-selecionados">
                @csrf
                <div class="organiza-tabela">
                    <table class="tabela-numeros" id="tabelaNumeros"></table>
                </div>

                @if ($rifa->qtd_num > 100)
                    <div class="pagination-list">
                        <button type="button" class="btn btn-pagination" id="page-decrement">Anterior</button>
                        <button type="button" class="btn btn-pagination" id="page-increment">Próximo</button>
                    </div>
                @endif
                <input type="hidden" name="selecionados" id="selecionados">
                <div class="buttonSubmit">
                    <a class="btn -comprar-cotas" id="btnReset">Limpar Cotas</a>
                    <button type="submit" class="btn -comprar-cotas" id="btnCompraRifas">Comprar cotas</button>
                </div>
            </form>
        </div>


        <div class="rifa-info -rifa-info-card -carrinho">
            <h1 class="">Resumo do pedido:</h1>
            <div class="info-instituicao">
                <div class="info-sorteio">
                    <p>Cotas selecionadas: </p>
                    <p id="array-quotas"></p>
                </div>
            </div>
            <div class="info-instituicao">
                <div class="info-sorteio">
                    <p>Qtd. Cotas Selecionadas: <strong> <span id="qtdQuotas"> </span> </strong></p>
                    <p>Valor por cota: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                            unid.</strong></p>

                </div>
                <p>Total: <strong> <span id="total"></span></strong></p>

            </div>

        </div>

    </section>
    <script src="{{ asset('js/selecionados.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const maxItems = 100;
            let paginationIndex = 0;
            const anterior = document.getElementById("page-decrement");
            const proximo = document.getElementById("page-increment");
            const tabelaNumeros = document.getElementById("tabelaNumeros");
            const qtdNum = {{ $rifa->qtd_num }};
            const totalPages = Math.ceil(qtdNum / maxItems);
            const numerosSelecionados = new Set();
            const arrayQuotas = document.getElementById("array-quotas");

            function atualizarArrayQuotas() {
                arrayQuotas.textContent = Array.from(numerosSelecionados).sort((a, b) => a - b).join(", ") ||
                    "Nenhuma cota selecionada";
            }

            function gerarTabela(index) {
                tabelaNumeros.innerHTML = "";

                const start = index * maxItems + 1;
                const end = Math.min(start + maxItems - 1, qtdNum);

                let tableRow = document.createElement("tr");

                for (let i = start; i <= end; i++) {
                    const tableData = document.createElement("td");
                    tableData.classList.add('numero');
                    tableData.id = `numero_${i}`;

                    const divQuota = document.createElement("div");
                    divQuota.classList.add("div-quota");

                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.value = i;
                    checkbox.classList = "check-quota";
                    checkbox.id = `checkbox-${i}`;
                    checkbox.checked = numerosSelecionados.has(i);

                    if (checkbox.checked) {
                        tableData.style.backgroundColor = 'var(--primary-green)';
                    }

                    const label = document.createElement("label");
                    label.htmlFor = `checkbox-${i}`;
                    label.classList = "label-quota";
                    label.textContent = i;

                    checkbox.addEventListener("click", () => {
                        const checkboxClicada = document.getElementById(`numero_${i}`);
                        if (checkbox.checked) {
                            numerosSelecionados.add(i);
                            checkboxClicada.style.backgroundColor = 'var(--primary-green)';
                            mostraTotalCotas();
                            mostraTotal();
                        } else {
                            numerosSelecionados.delete(i);
                            checkboxClicada.style.backgroundColor = '';
                            mostraTotalCotas();
                            mostraTotal();
                        }
                        atualizarArrayQuotas();
                    });

                    divQuota.appendChild(checkbox);
                    divQuota.appendChild(label);

                    tableData.appendChild(divQuota);
                    tableRow.appendChild(tableData);

                    if (i % 10 === 0 || i === end) {
                        tabelaNumeros.appendChild(tableRow);
                        tableRow = document.createElement("tr");
                    }
                }
            }

            anterior.addEventListener("click", (event) => {
                event.preventDefault();
                if (paginationIndex > 0) {
                    paginationIndex--;
                    gerarTabela(paginationIndex);
                }
            });

            proximo.addEventListener("click", (event) => {
                event.preventDefault();
                if (paginationIndex < totalPages - 1) {
                    paginationIndex++;
                    gerarTabela(paginationIndex);
                }
            });

            function obterCheckboxesMarcados() {
                return Array.from(numerosSelecionados).sort();
            }

            const formSelecionados = document.getElementById("form-selecionados");
            formSelecionados.addEventListener("submit", (event) => {
                const selecionados = obterCheckboxesMarcados();
                document.getElementById("selecionados").value = JSON.stringify(selecionados);

                if (selecionados.length === 0) {
                    event.preventDefault();
                    alert("Por favor, selecione ao menos uma cota antes de continuar.");
                }
            });

            const qtdQuotas = document.getElementById('qtdQuotas');
            const subtotal = document.getElementById('subtotal');
            const taxa = document.getElementById('tax');
            const total = document.getElementById('total');
            const pricePerQuota = @json($rifa->preco_numeros);

            function mostraTotalCotas() {
                qtdQuotas.innerHTML = numerosSelecionados.size || "Nenhuma.";
            }

            function mostraTotal() {
                const totalPrice = numerosSelecionados.size * pricePerQuota || 0;
                total.innerHTML = new Intl.NumberFormat('pt-BR', {
                    style: 'currency',
                    currency: 'BRL',
                }).format(totalPrice);
            }

            btnReset.addEventListener('click', function() {
                numerosSelecionados.clear();
                gerarTabela(0);
                mostraTotalCotas();
                mostraTotal();
                atualizarArrayQuotas();
            });


            gerarTabela(0);
            mostraTotalCotas();
            mostraTotal();

        });
    </script>

@endsection
