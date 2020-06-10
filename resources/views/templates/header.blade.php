<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>

    <body>

    <header>


                <div>
                    <nav>
                        <a href="{{Route('perfiles.index')}}">Perfiles</a>
                        <a href="{{Route('ofertas.index')}}">Ofertas de Trabajo</a>

                        <a href="{{Route('empresas.index')}}">Empresas</a>
                        <a href="{{Route('foro.index')}}">Foro</a>

                    </nav>
                </div>

        </header>

        @yield('content')

        <footer>

            <div>
                <p>Figaró-Montmany 08590 Barcelona</p>
                <p>+34 607 30 44 98</p>
                <p>info@masicacancruz.com</p>
            </div>
            <div class="social-footer">
                <a href=""><i class="fab fa-facebook-square fa-3x"></i></a>
                <a href=""><i class="fab fa-instagram-square fa-3x"></i></a>
                <a href=""><i class="fab fa-twitter-square fa-3x"></i></a>
            </div>
        </footer>
    </body>
</html>
