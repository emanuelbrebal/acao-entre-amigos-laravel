@extends('layouts.rifas')
@section('title', 'Página da Rifa - Ação Entre Amigos')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts/rifas.css') }}">
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
                <p>Prêmio da rifa: <strong>{{ $rifa->premiacao }}</strong></p>
                <p>Valor por cota: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                        unid.</strong></p>
                <p>Total de cotas: <strong>{{ $rifa->qtd_num }}</strong></p>
                <p>Cotas disponíveis: <strong>{{ $rifasDisponiveis }}</strong></p>
                @if ($rifa->id_usuario_vendedor != null)
                    <p>Vencedor: <strong> {{ $rifa->id_usuario_vencedor }}</strong></p>
                @else
                    <p>Data do sorteio: <strong> {{ date('d/m/Y', strtotime($rifa->data_sorteio)) }} </strong></p>
                    <p>Horário do sorteio: <strong>{{ $rifa->hora_sorteio }}</strong></p>
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
                <form class="organiza-tabela" action="{{ route('buyRaffleNumbers') }}" method="POST"
                    id="form-selecionados">
                    @csrf
                    @for ($i = 1; $i <= $rifa->qtd_num; $i++)
                        <div class="numero" id="numero_{{ $i }}">
                            @php
                                $numeroComprado = collect($numerosCompradosArray)->firstWhere('descricao', $i);
                            @endphp

                            @if ($numeroComprado)
                                <div class="div-quota {{$numeroComprado['comprador'] == $userID ? "-sua-cota" : "-comprada"}}">
                                    <input type="checkbox" value="{{ $i }}"
                                        class="check-quota -cursor-bloqueado" id="checkbox-{{ $i }}">
                                    {{ $i }}
                                </div>
                            @else
                                <div class="div-quota">
                                    <input type="checkbox" value="{{ $i }}" class="check-quota"
                                        id="checkbox-{{ $i }}" onclick="atualizaEstadoCotas(this)">
                                    {{ $i }}
                                </div>
                            @endif
                        </div>
                    @endfor
            </div>
            <div class="organiza-infos">
                <p class="legenda-p">Legenda:</p>
                <div class="legenda">
                    <div class="cota -disponivel"></div>
                    <p>Disponível</p>
                    <div class="cota -selecionada"></div>
                    <p>Selecionada</p>
                    <div class="cota -sua-cota"></div>
                    <p>Sua cota</p>
                    <div class="cota -comprada"></div>
                    <p>Comprada</p>
                </div>
                <input type="hidden" name="selecionados" id="selecionados">
                <input type="hidden" name="id_rifa" id="id_rifa" value="{{ $rifa->id }}">
            </div>
        </div>

        <div class="rifa-info -rifa-info-card -carrinho">
            <h1 class="">Resumo do pedido:</h1>
            <div class="info-instituicao">
                <div class="info-sorteio">
                    <p>Cotas selecionadas: </p>
                    <p id="array-quotas"> Nenhuma cota selecionada.</p>
                </div>
            </div>
            <div class="info-instituicao">
                <div class="info-sorteio">
                    <p>Qtd. Cotas Selecionadas: <strong> <span id="qtdQuotas"> </span> </strong></p>
                    <p>Valor por cota: <strong> R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                            unid.</strong></p>
                </div>
                <p>Total: <strong> <span id="total">R$ 0,00</span></strong></p>
                <div class="buttonSubmit">
                    <button type="button" class="btn -reset-cotas" id="btnReset">Limpar Cotas</button>
                    <button type="button" class="btn -comprar-cotas" data-bs-toggle="modal"
                        data-bs-target="#modalConfirmaCompra" id="btnCompraRifas">Comprar cotas</button>

                </div>
            </div>

        </div>

        @if (Auth::guard('usuarios')->user())
            <div class="modal fade" id="modalConfirmaCompra" tabindex="-1" aria-labelledby="modalConfirmaCompra"
                aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalConfirmaCompra">Confirmação de pedido</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Você, <strong>{{ Auth::guard('usuarios')->user()->nome }}</strong>, confirma seu pedido das
                            cotas
                            dos seguintes números:
                            <p id="array-quotas-carrinho"><strong></strong></p>
                            <p>No valor de <strong>R${{ number_format(round($rifa->preco_numeros, 2), 2, ',', '.') }}
                                </strong>
                                por cota,</p>
                            <p>Com o valor total de: <strong> <span id="total-modal"></span></strong></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" class="btn btn-primary">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </form>
        <div id="dados" data-numeros-comprados="{{ json_encode($numerosComprados) }}"
            data-qtd-num="{{ $rifa->qtd_num }}" data-price-per-quota="{{ $rifa->preco_numeros }}"
            data-usuario-logado="{{ Auth::guard('usuarios')->check() ? Auth::guard('usuarios')->user()->id : (Auth::guard('instituicao')->check() ? Auth::guard('instituicao')->user()->id : 'null') }}">
        </div>
    </section>
    <script src="{{ asset('js/rifa/cotasSelecionadas.js') }}"></script>
    <script src="{{ asset('js/rifa/atualizaEstadoCotas.js') }}"></script>
    <script src="{{ asset('js/rifa/atualizarArrayQuotas.js') }}"></script>
    <script src="{{ asset('js/rifa/inicializarEventosRifa.js') }}"></script>
    <script src="{{ asset('js/rifa/mostraTotalCotas.js') }}"></script>
    <script src="{{ asset('js/rifa/mostraValorTotal.js') }}"></script>
    <script src="{{ asset('js/rifa/limparSetCotas.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // atualizaEstadoCotas();
            inicializarEventosRifa();
            window.numerosSelecionados = new Set();
            window.dados = document.getElementById('dados');
        })
    </script>

@endsection
