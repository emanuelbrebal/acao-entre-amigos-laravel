<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tela de Login')</title>

    <link rel="shortcut icon" href="{{ asset('img/rifa_icon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createRaffle.css') }}">
</head>


<body>
    <header>
        <nav class="navbar nav -login">
            <div class="navbar-brand">
                <a href="{{ route('redirecionarHome') }}" class="navbrand-link">
                    <img class="icon-header" src="{{ asset('img/rifa_icon.png') }}"
                        alt="Desenho de uma urna e uma mão, que está tirando uma rifa sorteada.">
                </a>
                <p class="navbar-brand-text"><strong>Ação Entre Amigos</strong></p>
            </div>
        </nav>
    </header>

    <main class="main-login">
        @yield('content')
    </main>

    <script src="https://kit.fontawesome.com/f6fb35c3c9.js" crossorigin="anonymous"></script>
</body>

</html>
