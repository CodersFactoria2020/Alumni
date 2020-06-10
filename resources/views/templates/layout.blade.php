
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
    <header class="header">
    <div class="card-header col-md-12 header">
        <h1>Alumni</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{url('/perfiles/')}}">Perfiles</a></li>
                <li class="nav-item"><a href="{{url('/ofertas/')}}">Ofertas</a></li>
                <li class="nav-item"><a href="{{url('/empresas/')}}">Empresas</a></li>
                <li class="nav-item"><a href="{{url('/foro/')}}">Foro</a></li>
            </ul>
        </nav>
    </div>
    </header>
    @yield('content')
</body>
    <footer>
        <div class="card-footer col-md-12">
        <h1>Alumni Footer</h1>
        </div>
    </footer>
    </body>
</html>
