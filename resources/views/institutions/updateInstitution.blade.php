@extends('layouts.loginLayout')
@section('title', 'Minha Conta Instituição- Ação Entre Amigos')
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
            <h1 class="form-title">INFORMAÇÕES DA CONTA DA INSTITUIÇÃO</h1>
            <h5>Aqui você pode verificar e editar os dados da sua conta.</h5>
        </div>
        <form class="cadastro-form" action="{{ route('updateInstituicao') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $instituicao->id }}">

            <div class="campo-formulario">
                <label for="nome">Nome:</label>
                <input class="form-input" type="text" id="nome" name="nome" value="{{ $instituicao->nome }}">
            </div>

            <div class="campo-formulario">
                <label for="cnpj">CNPJ:</label>
                <input class="form-input" type="text" id="cnpj" name="cnpj" value="{{ $instituicao->cnpj }}"
                    maxlength="18" oninput="formataCNPJ(this)">
            </div>

            <div class="campo-formulario">
                <label for="email">E-mail:</label>
                <input class="form-input" type="email" id="email" name="email" value="{{ $instituicao->email }}">
            </div>

            <div class="campo-formulario">
                <label for="celular">Número de celular:</label>
                <input class="form-input" type="text" id="celular" name="celular" value="{{ $instituicao->celular }}"
                    maxlength="15" oninput="formataCelular(this)">
            </div>

            <div class="campo-formulario">
                <label for="endereco">Endereço:</label>
                <input class="form-input" type="text" id="endereco" name="endereco"
                    value="{{ $instituicao->endereco }}">
            </div>

            <button class="btn btn-submit" type="submit">Alterar Informações</button>
        </form>
    </section>
    <script src="{{ asset('js/formataCNPJ.js') }}"></script>
    <script src="{{ asset('js/formataCelular.js') }}"></script>
    <script src="{{ asset('js/formataCamposReload.js') }}"></script>

@endsection
