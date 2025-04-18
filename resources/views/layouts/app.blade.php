<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <header>
        <nav class="navbar nav">
            <div class="navbar-brand">
                <a href="{{ route('redirecionarHome') }}" class="navbrand-link">
                    <img class="icon-header" src="{{ asset('img/rifa_icon.png') }}"
                        alt="Desenho de uma urna e uma mão, que está tirando uma rifa sorteada.">
                </a>
                <p class="navbar-brand-text"><strong>Ação Entre Amigos</strong></p>
            </div>

            <div class="organiza-links">
                <ul class="navigation">

                    <a class="navigation-item" href="{{ route('redirecionarSobre') }}">Sobre</a>
                    @if (Auth::guard('usuarios')->check())
                        <a class="navigation-item" href="{{ route('boughtRaffleNumbers') }}">Minhas cotas</a>
                    @elseif (Auth::guard('instituicao')->check())
                        <a class="navigation-item" href="{{ route('redirecionarCreateRaffle') }}">Cadastrar
                            Rifa</a>
                        <a class="navigation-item" href="{{ route('listMyRaffles') }}">Minhas Rifas</a>
                        <a class="navigation-item" href="">Fazer Sorteio</a>
                    @endif
                    <div class="logout-wrapper">
                        <a class="navigation-item -logged-user" id="userLogado">
                            @if (Auth::guard('usuarios')->check())
                                <svg class="login-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                </svg>
                                Bem-vindo(a), {{ Auth::guard('usuarios')->user()->nome }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="#fff"
                                        d="m17.5 8.086l-5.5 5.5l-5.5-5.5L5.086 9.5L12 16.414L18.914 9.5z" />
                                </svg>
                            @elseif (Auth::guard('instituicao')->check())
                                <svg class="login-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="#fff" stroke-width="1.5">
                                        <path stroke-linecap="round"
                                            d="M22 22H2m0-11l8.126-6.5a3 3 0 0 1 3.748 0L22 11m-6.5-5.5v-2A.5.5 0 0 1 16 3h2.5a.5.5 0 0 1 .5.5v5M4 22V9.5M20 22V9.5" />
                                        <path
                                            d="M15 22v-5c0-1.414 0-2.121-.44-2.56C14.122 14 13.415 14 12 14s-2.121 0-2.56.44C9 14.878 9 15.585 9 17v5m5-12.5a2 2 0 1 1-4 0a2 2 0 0 1 4 0Z" />
                                    </g>
                                </svg>
                                Bem-vindo(a), {{ Auth::guard('instituicao')->user()->nome }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="#fff"
                                        d="m17.5 8.086l-5.5 5.5l-5.5-5.5L5.086 9.5L12 16.414L18.914 9.5z" />
                                </svg>
                            @endif

                        </a>
                        <div class="user-options">
                            <form class="form-logout" id="formLogout" action="{{ route('fazerLogout') }}"
                                method="POST" id="form-logout">
                                @csrf
                                <div class="organiza-logout">
                                    @if (Auth::guard('usuarios')->user())
                                        <a class="navigation-item" href="{{ route('listarUsuario') }}">Minha conta</a>
                                    @endif
                                    
                                    @if (Auth::guard('instituicao')->user())
                                        <a class="navigation-item" href="{{ route('listarInstituicao') }}">Minha conta</a>
                                    @endif
                                    <button type="submit" class="navigation-item btn-logout" id="btnLogout">
                                        Fazer Logout
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="#fff"
                                                d="M4 20V4h8.02v1H5v14h7.02v1zm12.462-4.461l-.702-.72l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.702-.718L20 12z"
                                                stroke-width="0.5" stroke="#fff" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
    <main class="content-main">
        @yield('content')
    </main>

    <footer class="footer">
        <p class="footer-copy">&copy; {{ date('Y') }} Ação Entre Amigos</p>
        <div>
            <a href="https://github.com/emanuelbrebal" target="_blank" class="footer-link">github</a>
            <a href="https://www.linkedin.com/in/emanuel-victor-brebal/" target="_blank"
                class="footer-link">linkedin</a>
        </div>
    </footer>

</body>
<script></script>

<script src="https://kit.fontawesome.com/f6fb35c3c9.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/logout.js') }}" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{asset('js/modalFade.js')}}"  crossorigin="anonymous"> </script>

</html>
