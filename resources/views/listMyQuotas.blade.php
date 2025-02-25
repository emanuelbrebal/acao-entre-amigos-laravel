@extends('layouts.rifas')
@section('title', 'Minhas Cotas - Ação Entre Amigos')
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
            <h1>Rifas ativadas de <strong>{{ $instituicaoLogada->nome }}:</strong></h1>
        </li>
    </ul>
    <section class="minhas-cotas rifas-section">
        @foreach ($activatedRaffles as $rifas )
            <div class="rifa-container {{ $rifas->ativado ? '-ativado' : '-desativado' }}">
                <div class="rifa-top">
                    <div class="rifa-top-top">
                        <img class="rifa-icon" src="{{ asset('img/raffles/' . $rifas->imagem) }}" alt="Imagem da rifa">
                        <h3 class="rifa-title -quotas">Rifa: {{ $rifas->titulo_rifa }}</h3>
                    </div>
                    <p>Data do sorteio:
                        <strong> {{ \Carbon\Carbon::parse($rifas->data_sorteio)->format('d/m/Y') }}
                        </strong>
                    </p>
                    <p>Horario do sorteio
                        <strong>{{ $rifas->hora_sorteio }}</strong>
                    </p>
                    <p>Cotas:</p>
                    <div class="rifa-description -raffle-list">
                        <p>
                            Compradas: {{ $numerosTotais[$rifas->id]->total ?? 0 }}
                        </p>
                        <progress class="progress" max="{{ $qtdTotais[$rifas->id] }}"
                            value="{{ $numerosTotais[$rifas->id]->total ?? 0 }}"> </progress>
                        <p>
                            Totais: {{ $qtdTotais[$rifas->id] }}
                        </p>
                    </div>
                    <p>Valor por cota: R$<strong>{{ number_format($valorCotas->get($rifas->id) ?? 0, 2, ',', '.') }}
                        </strong></p>

                    <p>Total arrecadado:
                        R$<strong>{{ number_format(($valorCotas->get($rifas->id) ?? 0) * ($numerosTotais->get($rifas->id)?->total ?? 0), 2, ',', '.') }}
                        </strong>
                    </p>

                    <div class="options">
                        <a class="btn btn-secondary" href="{{ route('redirecionarRifa', ['id' => $rifas->id]) }}">Ver
                            Rifa</a>
                        <a type class="btn btn-primary"
                            href="{{ route('updateMyRaffles', ['id' => $rifas->id]) }}">Editar Rifa</a>
                        <button type="button" class="btn {{ $rifas->ativado ? 'btn-danger' : 'btn-success' }}"
                            data-bs-toggle="modal" data-bs-target="#modalConfirmaDesativação{{ $rifas->id }}"
                            id="btnDesativaRifas">{{ $rifas->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
                    </div>

                    <div class="modal fade" id="modalConfirmaDesativação{{ $rifas->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:var(--black);">
                                        Confirmação
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="color:var(--black);">Você,
                                        <strong>{{ Auth::guard('instituicao')->user()->nome }}</strong>, confirma que irá
                                        desativar a
                                        <br><strong> Rifa: <span
                                                style="text-transform:uppercase">{{ $rifas->titulo_rifa }}</span></strong>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <form
                                        action="{{ $rifas->ativado ? route('desativarRifa', ['id' => $rifas->id]) : route('ativarRifa', ['id' => $rifas->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit"
                                            class="btn {{ $rifas->ativado ? 'btn-danger' : 'btn-success' }}">
                                            {{ $rifas->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <ul class="titulo-my-quotas">
        <li>
            <h1>Rifas ativadas de <strong>{{ $instituicaoLogada->nome }}:</strong></h1>
        </li>
    </ul>
    <section class="minhas-cotas rifas-section">
        @foreach ($deactivatedRaffles as $idRifa => $rifas)
            <div class="rifa-container {{ $rifas->ativado ? '-ativado' : '-desativado' }}">
                <div class="rifa-top">
                    <div class="rifa-top-top">
                        <img class="rifa-icon" src="{{ asset('img/raffles/' . $rifas->imagem) }}" alt="Imagem da rifa">
                        <h3 class="rifa-title -quotas">Rifa: {{ $rifas->titulo_rifa }}</h3>
                    </div>
                    <p>Data do sorteio:
                        <strong> {{ \Carbon\Carbon::parse($rifas->data_sorteio)->format('d/m/Y') }}
                        </strong>
                    </p>
                    <p>Horario do sorteio
                        <strong>{{ $rifas->hora_sorteio }}</strong>
                    </p>
                    <p>Cotas:</p>
                    <div class="rifa-description -raffle-list">
                        <p>
                            Compradas: {{ $numerosTotais[$rifas->id]->total ?? 0 }}
                        </p>
                        <progress class="progress" max="{{ $qtdTotais[$rifas->id] }}"
                            value="{{ $numerosTotais[$rifas->id]->total ?? 0 }}"> </progress>
                        <p>
                            Totais: {{ $qtdTotais[$rifas->id] }}
                        </p>
                    </div>
                    <p>Valor por cota: R$<strong>{{ number_format($valorCotas->get($rifas->id) ?? 0, 2, ',', '.') }}
                        </strong></p>

                    <p>Total arrecadado:
                        R$<strong>{{ number_format(($valorCotas->get($rifas->id) ?? 0) * ($numerosTotais->get($rifas->id)?->total ?? 0), 2, ',', '.') }}
                        </strong>
                    </p>

                    <div class="options">
                        <a class="btn btn-secondary" href="{{ route('redirecionarRifa', ['id' => $rifas->id]) }}">Ver
                            Rifa</a>
                        <a type class="btn btn-primary"
                            href="{{ route('updateMyRaffles', ['id' => $rifas->id]) }}">Editar
                            Rifa</a>
                        <button type="button" class="btn {{ $rifas->ativado ? 'btn-danger' : 'btn-success' }}"
                            data-bs-toggle="modal" data-bs-target="#modalConfirmaDesativação{{ $rifas->id }}"
                            id="btnDesativaRifas">{{ $rifas->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
                    </div>

                    <div class="modal fade" id="modalConfirmaDesativação{{ $rifas->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:var(--black);">
                                        Confirmação
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="color:var(--black);">Você,
                                        <strong>{{ Auth::guard('instituicao')->user()->nome }}</strong>, confirma que irá
                                        desativar a
                                        <br><strong> Rifa: <span
                                                style="text-transform:uppercase">{{ $rifas->titulo_rifa }}</span></strong>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <form
                                        action="{{ $rifas->ativado ? route('desativarRifa', ['id' => $rifas->id]) : route('ativarRifa', ['id' => $rifas->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit"
                                            class="btn {{ $rifas->ativado ? 'btn-danger' : 'btn-success' }}">
                                            {{ $rifas->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

@endsection
