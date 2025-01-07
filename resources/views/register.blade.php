<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tela de Login')</title>

    <link rel="shortcut icon" href="{{ asset('img/rifa_icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
</head>

<body>
    <header>
        <nav class="navbar nav -login">
            <div class="navbar-brand ">
                <img class="icon-header" src="{{ asset('img/rifa_icon.png') }}"
                    alt="Desenho de uma urna e uma mão, que está tirando uma rifa sorteada.">
                <p class="navbar-brand-text"><strong>Ação Entre Amigos</strong></p>
            </div>
        </nav>
    </header>

    <main class="main-login -register">
        <section class="section-login -register">
            <div class="login-box">
                <form action="" class="form-login">
                    @csrf
                    <h3 class="form-title">Faça o seu Registro!</h3>
                    <input class="form-input" type="text" placeholder="CPF" name="cpf">
                    <input class="form-input" type="text" placeholder="Nome" name="nome">
                    <input class="form-input" type="text" placeholder="Email" name="email">
                    <input class="form-input" type="text" placeholder="Número de celular" name="num_celular">
                    <input class="form-input" type="password" placeholder="Senha" name="password" id="passwordInput1">
                    <div class="show-password-div">
                        <p class="show-password">
                            Mostrar a senha?
                        </p>
                        <input class="form-checkbox" type="checkbox" onclick="togglePasswordVisible1()">
                    </div>
                    <input class="form-input" type="password" placeholder="Repita Senha" name="password-check" id="passwordInput2">
                    <div class="show-password-div">
                        <p class="show-password">
                            Mostrar a senha?
                        </p>
                        <input class="form-checkbox" type="checkbox" onclick="togglePasswordVisible2()">
                    </div>
                    <button class="form-button" type="submit" href="">Login</button>
                    <p class="form-p">
                        Já tem cadastro?
                        <a class="form-a" href="{{Route('redirecionarLogin')}}">
                            Faça login agora!
                        </a>
                    </p>
                </form>
            </div>
        </section>
    </main>

</body>

<script>
    function togglePasswordVisible1() {
        var passwordInput = document.getElementById('passwordInput1');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    function togglePasswordVisible2() {
        var passwordInput = document.getElementById('passwordInput2');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</html>
