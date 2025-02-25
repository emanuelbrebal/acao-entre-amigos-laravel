@extends('layouts.loginLayout')
@section('title', 'Tela de Cadastro - Ação Entre Amigos')
@section('content')
    <section class="section-login -register">
        <div class="login-box">
            <form action="{{route('criarRegistro')}}" class="form-login" method="POST" id="registroForm">
                @csrf
                <h3 class="form-title">Faça o seu Registro!</h3>
                <select class="form-input" name="tipo_usuario" id="select-login">
                    <option value="cpf">Pessoa Física</option>
                    <option value="cnpj">Instituição - Pessoa Jurídica</option>
                </select>
                <input class="form-input" type="text" placeholder="CPF" name="cpf" id="campo-cpf">
                <input class="form-input" type="text" placeholder="CNPJ" name="cnpj" id="campo-cnpj"
                    style="display: none;" disabled>

                <input class="form-input" type="text" placeholder="Nome" name="nome">
                <input class="form-input" type="text" placeholder="Email" name="email">
                <input class="form-input" type="text" placeholder="Número de celular" name="celular">
                <input class="form-input" type="text" placeholder="Endereço" name="endereco">
                <div class="show-password-div">
                    <svg class="show-password" id="togglePassword1" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path
                                d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19s-7.764-4.013-9.257-5.962a1.69 1.69 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5s7.764 4.013 9.257 5.962" />
                            <circle cx="12" cy="12" r="3" />
                        </g>
                    </svg>
                    <input class="form-input" type="password" placeholder="Senha" name="password" id="passwordInput1">
                </div>

                <div class="show-password-div">
                    <svg class="show-password" id="togglePassword2" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path
                                d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19s-7.764-4.013-9.257-5.962a1.69 1.69 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5s7.764 4.013 9.257 5.962" />
                            <circle cx="12" cy="12" r="3" />
                        </g>
                    </svg>
                    <input class="form-input" type="password" placeholder="Repita Senha" name="password-check"
                        id="passwordInput2">
                </div>

                <button class="form-button" type="submit" id="registroBtn">Registre sua conta!</button>
                <p class="form-p">
                    Já tem cadastro?
                    <a class="form-a" href="{{ Route('redirecionarLogin') }}">
                        Faça login agora!
                    </a>
                </p>
            </form>
        </div>
        <script src="{{ asset('js/register.js') }}"></script>
    @endsection
