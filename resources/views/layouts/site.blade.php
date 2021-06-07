<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />

    <!-- Open Graph -->
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
    <meta property="og:description" content="{{ isset($seo['titulo']) ? $seo['descricao'] : config('seo.descricao') }}" />
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('layouts._site._nav')
    </header>
    <main>
        @if(Session::has('mensagem'))
        <div class="container">
            <div class="row">
                <div class="card {{ Session::get('mensagem')['class'] }}">
                    <div class="card-content">
                        {{ Session::get('mensagem')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @yield('content')
    </main>
    <footer>
        @include('layouts._site._footer')
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
