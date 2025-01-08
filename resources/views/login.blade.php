@extends('layouts.loginLayout')
@section('title', 'Ação Entre Amigos - Tela de Login')
@section('content')
    <section class="section-login">
        <div class="login-box">
            <form action="" class="form-login">
                @csrf
                <h3 class="form-title">Faça o seu login!</h3>
                <input class="form-input" type="text" placeholder="Email" name="email">
                <div class="show-password-div">
                    <svg class="show-password" id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19s-7.764-4.013-9.257-5.962a1.69 1.69 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5s7.764 4.013 9.257 5.962" />
                            <circle cx="12" cy="12" r="3" />
                        </g>
                    </svg>
                    <input class="form-input" type="password" placeholder="Senha" name="password" id="passwordInput">
                </div>
                <button class="form-button" type="submit" href="">Login</button>
                <p class="form-p">
                    Não tem cadastro?
                    <a class="form-a" href="{{ Route('redirecionarRegistro') }}">
                        Registre-se agora!
                    </a>
                </p>
            </form>
        </div>
    </section>



    <script>
        const passwordInput = document.getElementById("passwordInput");
        const togglePassword = document.querySelector("#togglePassword")

        togglePassword.addEventListener("click", function (){
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;
        })

    </script>
@endsection
