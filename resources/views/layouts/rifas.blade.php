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
    <link rel="stylesheet" href="{{ asset('css/layouts/rifas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mainInicial.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        </nav>
    </header>

    <main class="info-main">
        @yield('content')
    </main>

    <footer class="footer">
        <p class="footer-copy">&copy; {{ date('Y') }} Ação Entre Amigos</p>
        <div>
            <a href="https://github.com/emanuelbrebal" target="_blank" class="footer-link">github</a>
            <a href="https://www.linkedin.com/in/emanuel-victor-brebal/" target="_blank" class="footer-link">linkedin</a>
            <a href="" class="footer-link" target="_blank">contatos</a>
            {{-- fazer um modal com todos os contatos --}}

        </div>
    </footer>
    <script src="https://kit.fontawesome.com/f6fb35c3c9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
