@extends('layouts.loginLayout')
@section('title', 'Minha Conta - Ação Entre Amigos')
@section('content')

    <div class="btn-voltar">
        <a href="{{ route('redirecionarHome') }}" class="btn -voltar"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                height="20" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M21 12h-17.5" />
                    <path d="M3 12l7 7M3 12l7 -7" />
                </g>
            </svg>
            voltar</a>
    </div>

    <section class="cadastro-main">
        <div class="informacoes-cadastro">
            <h1 class="form-title">INFORMAÇÕES DA CONTA DO USUÁRIO</h1>
            <h5>Aqui você pode verificar e editar os dados da sua conta.</h5>
        </div>
        <form class="cadastro-form" action="{{ route('updateUsuario') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="campo-formulario">
                <label for="nome">Nome:</label>
                <input class="form-input" type="text" id="nome" name="nome" value="{{ $user->nome }}">
            </div>

            <div class="campo-formulario">
                <label for="cpf">CPF:</label>
                <input class="form-input" type="text" id="cpf" name="cpf" value="{{ $user->cpf }}"
                    maxlength="14" oninput="formataCPF(this)">
            </div>

            <div class="campo-formulario">
                <label for="email">E-mail:</label>
                <input class="form-input" type="email" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="campo-formulario">
                <label for="celular">Número de celular:</label>
                <input class="form-input" type="text" id="celular" name="celular" value="{{ $user->celular }}"
                    maxlength="15" oninput="formataCelular(this)">
            </div>

            <div class="campo-formulario">
                <label for="endereco">Endereço:</label>
                <input class="form-input" type="text" id="endereco" name="endereco" value="{{ $user->endereco }}">
            </div>

            <button class="btn btn-submit" type="submit">Alterar Informações</button>
        </form>
    </section>

    <script src="{{ asset('js/formataCPF.js') }}"></script>
    <script src="{{ asset('js/formataCelular.js') }}"></script>
    <script src="{{ asset('js/formataCamposReload.js') }}"></script>
@endsection
