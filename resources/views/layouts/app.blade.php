<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Alumni</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/perfil.css') }}" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- icons Awesome -->
        <script src="https://kit.fontawesome.com/68133e56f0.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="header" id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
                <div class="container">
                    <a class="logoHeader" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }}-->Alumni
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <div class="menu">
                            <nav>
                                <ul class="menuUl">

                                    <li><a href="{{Route('home')}}">Inicio</a></li>
                                    <li><a href="{{Route('profile.index')}}">Perfiles</a></li> --}}
                                    <li><a href="{{Route('jobOffers.index')}}">Ofertas de Trabajo</a></li>
                                    <li><a href="{{Route('empresa.index')}}">Empresas</a></li>

                                    <li><a href="{{Route('faq.index')}}">FAQ</a></li>

                                </ul>
                             </nav>
                        </div>
                    </div> <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- *********** Enlace para registrarse *********-->
                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->

                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            User Dashboard
                                        </a>

                                        @if (auth()->user()->roles[0]->name==="Admin")
                                            <a class="dropdown-item" href="{{ route('admin') }}">
                                                Admin Dashboard
                                            </a>
                                        @endif

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>



                                </li>
                        @endguest
                    </ul>
                </div>
            </nav>

        <main class="py-4 container">
            @yield('content')
            @yield('pruebas')
        </main>
        @include('templates.footer')
        </div>
    </body>
</html>

