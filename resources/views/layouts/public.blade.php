<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="mt-3">
        <div class="container mb-3 text-center">
            <img src="/images/logo.jpeg" width="200em" class="mb-3">
            <h2 class="text-uppercase">Processo de escolha para professores tutores 2022</h2>
            <h3 class="text-uppercase">Escola Cidadã Integral José Nominando</h3>
            <h4 class="fst-italic fw-light">"O futuro pertence àqueles que acreditam na beleza de seus sonhos".</h4>
        </div>
        <main class="py-4 container">
            @yield('content')
        </main>
        <footer class="py-4 container text-center">
            <img src="/images/rodape.jpeg" width="350em" class="mt-3">
        </footer>
    </div>
</body>

</html>
