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

    <main>
        <section class="login-main">
            <div class="login-box">
                <form action="" class="form-login">
                    @csrf
                    <input type="text" placeholder="Nome">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Senha">
                    <input type="text" placeholder="Repita Senha">
                    <button type="submit">Login</button>
                    <p>
                        Não tem cadastro?
                        <a href="">
                            Registre-se agora!
                        </a>
                    </p>
                </form>
            </div>
        </section>
    </main>



</body>

</html>
