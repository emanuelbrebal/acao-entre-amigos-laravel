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
    <section class="minhas-cotas rifas-section">
        @foreach ($minhasRifas as $idRifa => $numeros)
            <div class="rifa-container {{$numeros->ativado ? '-ativado' : '-desativado'}}">
                <div class="rifa-top">
                    <div class="rifa-top-top">
                        <img class="rifa-icon" src="{{ asset('img/raffles/' . $numeros->imagem) }}" alt="Imagem da rifa">
                        <h3 class="rifa-title -quotas">Rifa: {{ $numeros->titulo_rifa }}</h3>
                    </div>
                    <p>Data do sorteio:
                        <strong> {{ \Carbon\Carbon::parse($numeros->data_sorteio)->format('d/m/Y') }}
                        </strong>
                    </p>
                    <p>Horario do sorteio
                        <strong>{{ $numeros->hora_sorteio }}</strong>
                    </p>
                    <p>Cotas:</p>
                    <div class="rifa-description -raffle-list">
                        <p>
                            Compradas: {{ $numerosTotais[$numeros->id]->total ?? 0 }}
                        </p>
                        <progress class="progress" max="{{ $qtdTotais[$numeros->id] }}"
                            value="{{ $numerosTotais[$numeros->id]->total ?? 0 }}"> </progress>
                        <p>
                            Totais: {{ $qtdTotais[$numeros->id] }}
                        </p>
                    </div>
                    <p>Valor por cota: R$<strong>{{ number_format($valorCotas->get($numeros->id) ?? 0, 2, ',', '.') }}
                        </strong></p>

                    <p>Total arrecadado:
                        R$<strong>{{ number_format(($valorCotas->get($numeros->id) ?? 0) * ($numerosTotais->get($numeros->id)?->total ?? 0), 2, ',', '.') }}
                        </strong>
                    </p>

                    <div class="options">
                        <a class="btn btn-secondary" href="{{ route('redirecionarRifa', ['id' => $numeros->id]) }}">Ver
                            Rifa</a>
                        <a type class="btn btn-primary"
                            href="{{ route('updateMyRaffles', ['id' => $numeros->id]) }}">Editar Rifa</a>
                        <button type="button" class="btn {{ $numeros->ativado ? 'btn-danger' : 'btn-success' }}"
                            data-bs-toggle="modal" data-bs-target="#modalConfirmaDesativação{{$numeros->id}}"
                            id="btnDesativaRifas">{{ $numeros->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
                    </div>

                    <div class="modal fade" id="modalConfirmaDesativação{{$numeros->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
                                                style="text-transform:uppercase">{{ $numeros->titulo_rifa }}</span></strong>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <form
                                        action="{{ $numeros->ativado ? route('desativarRifa', ['id' => $numeros->id]) : route('ativarRifa', ['id' => $numeros->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn {{ $numeros->ativado ? 'btn-danger' : 'btn-success' }}"> {{ $numeros->ativado ? 'Desativar Rifa' : 'Ativar Rifa' }}</button>
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
