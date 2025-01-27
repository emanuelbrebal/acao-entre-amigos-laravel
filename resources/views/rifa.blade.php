@extends('layouts.rifas')
@section('title', 'Página da Rifa')
@section('content')

    <section class="rifa-infos">
        <div class="rifa-info -rifa-info-card">
            <a href="{{ route('redirecionarHome') }}" class="btn -voltar"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24">
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
            <h1 class="cotacao">escolha suas cotas:</h1>
            <div class="tabela-cotas">
                <form action="{{ route('buyRaffleNumbers') }}" method="POST" id="form-selecionados">
                    @csrf
                    <div class="organiza-tabela">
                        <table class="tabela-numeros" id="tabelaNumeros"></table>
                    </div>
                    <div class="organiza-infos">
                        <p class="legenda-p">Legenda:</p>
                        <div class="legenda">
                            <div class="cota -disponivel"></div>
                            <p>Disponível</p>
                            <div class="cota -selecionada"></div>
                            <p>Selecionada</p>
                            <div class="cota -comprada"></div>
                            <p>Comprada</p>
                        </div>
                    </div>

                    <input type="hidden" name="selecionados" id="selecionados">

                    @if ($rifa->qtd_num > 100)
                        <div class="pagination-list">
                            <button type="button" class="btn btn-pagination" id="pageDecrement">Anterior</button>
                            <button type="button" class="btn btn-pagination" id="pageIncrement">Próximo</button>
                        </div>
                    @endif
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
                <div class="buttonSubmit">
                    <a class="btn -reset-cotas" id="btnReset">Limpar Cotas</a>
                    <button type="button" class="btn -comprar-cotas" data-toggle="modal" data-target="#modalConfirmaCompra"
                        id="btnCompraRifas">Comprar cotas</button>
                </div>
            </div>

        </div>

        <div class="modal fade" id="modalConfirmaCompra" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de pedido</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Você, cliente, confirma seu pedido das cotas dos seguintes números:
                        <p id="array-quotas-carrinho"><strong></strong></p>
                        <p>No valor de <strong>R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }} </strong>
                            por cota,</p>
                        <p>Com o valor total de: <strong><span id="valor-total"></span></strong></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const maxItems = 100;
            let paginationIndex = 0;
            const anterior = document.getElementById("pageDecrement");
            const proximo = document.getElementById("pageIncrement");
            const tabelaNumeros = document.getElementById("tabelaNumeros");
            const qtdNum = {{ $rifa->qtd_num }};
            const totalPages = Math.ceil(qtdNum / maxItems);
            const numerosSelecionados = new Set();
            const pricePerQuota = {{ $rifa->preco_numeros }};

            function atualizarArrayQuotas() {
                const arrayQuotas = document.getElementById("array-quotas");
                const quotasCarrinho = document.getElementById("array-quotas-carrinho");
                const selectedArray = Array.from(numerosSelecionados).sort((a, b) => a - b);
                arrayQuotas.textContent = selectedArray.join(", ") || "Nenhuma cota selecionada";
                quotasCarrinho.textContent = selectedArray.join(", ") || "Nenhuma cota selecionada";
            }

            function gerarTabela(index) {
                tabelaNumeros.innerHTML = "";
                const start = index * maxItems + 1;
                const end = Math.min(start + maxItems - 1, qtdNum);
                let tableRow = document.createElement("tr");

                for (let i = start; i <= end; i++) {
                    const tableData = document.createElement("td");
                    tableData.classList.add("numero");
                    tableData.id = `numero_${i}`;

                    const divQuota = document.createElement("div");
                    divQuota.classList.add("div-quota");

                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.value = i;
                    checkbox.classList.add("check-quota");
                    checkbox.id = `checkbox-${i}`;
                    checkbox.checked = numerosSelecionados.has(i);

                    if (checkbox.checked) {
                        tableData.style.backgroundColor = "var(--primary-green)";
                    }

                    const label = document.createElement("label");
                    label.htmlFor = `checkbox-${i}`;
                    label.classList.add("label-quota");
                    label.textContent = i;

                    checkbox.addEventListener("click", () => {
                        if (checkbox.checked) {
                            numerosSelecionados.add(i);
                            tableData.style.backgroundColor = "var(--primary-green)";
                        } else {
                            numerosSelecionados.delete(i);
                            tableData.style.backgroundColor = "";
                        }
                        atualizarArrayQuotas();
                        mostraTotalCotas();
                        mostraTotal();
                    });

                    divQuota.appendChild(checkbox);
                    divQuota.appendChild(label);

                    tableData.appendChild(divQuota);
                    tableRow.appendChild(tableData);

                    if (qtdNum < 100) {
                        if (i % 5 === 0 || i === end) {
                            tabelaNumeros.appendChild(tableRow);
                            tableRow = document.createElement("tr");
                        }
                    } else {
                        if (i % 10 === 0 || i === end) {
                            tabelaNumeros.appendChild(tableRow);
                            tableRow = document.createElement("tr");
                        }
                    }

                }
            }

            if (anterior && proximo) {

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
            }

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

            const btnReset = document.getElementById("btnReset");
            btnReset.addEventListener("click", () => {
                numerosSelecionados.clear();
                gerarTabela(paginationIndex);
                atualizarArrayQuotas();
                mostraTotalCotas();
                mostraTotal();
            });

            gerarTabela(0);
            atualizarArrayQuotas();
            mostraTotalCotas();
            mostraTotal();

        });
    </script>

@endsection
