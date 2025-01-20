<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/rifa_icon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mainInicial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
</head>

<body>
    <header>
        <nav class="navbar nav">
            <div class="navbar-brand">
                <img class="icon-header" src="{{ asset('img/rifa_icon.png') }}"
                    alt="Desenho de uma urna e uma mão, que está tirando uma rifa sorteada.">
                <p class="navbar-brand-text"><strong>Ação Entre Amigos</strong></p>
            </div>

            <ul class="navigation">
                <a class="navigation-item" href=" {{ route('redirecionarCreateRaffle') }}">Cadastrar Rifa</a>
                <a class="navigation-item" href="{{ route('redirecionarSobre') }}">Sobre</a>
                <a class="navigation-item" href="">Bem vindo(a) {{ $user->nome }}
                    <svg class="login-icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                    </svg>
                    <div class="logout-wrapper">
                        <form action="{{ route('fazerLogout') }}" method="POST">
                            @csrf
                            <button type="submit">Sair</button>
                        </form>

                    </div>
                </a>
            </ul>
        </nav>
    </header>
    <div class="container-alerta">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <p class="text-center">{{ session('error') }}</p>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success" role="alert">
                <p class="text-center">{{ session('success') }}</p>
            </div>
        @endif
    </div>
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p class="footer-copy">&copy; {{ date('Y') }} Ação Entre Amigos</p>
        <div>
            <a href="https://github.com/emanuelbrebal" class="footer-link">github</a>
            <a href="https://www.linkedin.com/in/emanuel-victor-brebal/" class="footer-link">linkedin</a>
            <a href="" class="footer-link">contatos</a>
            {{-- fazer um modal com todos os contatos --}}

        </div>
    </footer>
    <script src="https://kit.fontawesome.com/f6fb35c3c9.js" crossorigin="anonymous"></script>
</body>

</html>
