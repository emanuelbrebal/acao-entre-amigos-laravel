<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minha Aplicação')</title>
    <!-- Inclua seus estilos aqui -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <nav>
            <a href="">Home</a>
            <a href="">Sobre</a>
            <a href="">Contato</a>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; {{ date('Y') }} Minha Aplicação</p>
    </footer>
</body>
</html>
