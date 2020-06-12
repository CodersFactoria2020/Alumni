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
        @yield('content')

        <div class="footer">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active"><i class="fa fa-phone"></i> +34 39493 0349</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#"><i class="fa fa-info-circle"></i> info</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-reset" href="#"><i class="fa fa-envelope"></i> email</a>
                </li>

            </ul>
        </div>

    </body>
</html>
