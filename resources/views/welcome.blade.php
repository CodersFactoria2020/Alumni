<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Alumni Factoria F5</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="ImgHome">
            <!-- <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div> -->


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <div class="backacces">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="inputlog form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="inputlog form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary buttonlog" >
                                        <!-- {{ __('Login') }} -->Entrar en mi cuenta
                                    </button><br>

                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                            <div class="col-md-4"><br>
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="checkbox" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                                <div class="col-md-6 forgotpssw">
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}</a>
                                                    @endif
                                                </div>
                                        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

                                        <script>
                                            var botmanWidget = {
                                                frameEndpoint: '/botman/chat',
                                                chatServer : 'conversation',
                                                title: 'Alibot',
                                                mainColor: '#456765',
                                                bubbleBackground: '#ff76f4',
                                                aboutText: '',
                                                bubbleAvatarUrl: 'https://i.postimg.cc/WbTzJKnW/logo.png',
                                            };
                                        </script>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<footer class="footertemplate">
                <div class="icons-footer" id="DivIconosFooter">
                    <i class="fa fa-facebook-square" id="IconoFacebook"></i>
                    <i class="fa fa-instagram"></i>
                    <i href="" class="fa fa-twitter-square" id="IconosTwitter"></i>
                </div>
                <div>
                    <h3>Sobre Nosotros </h3>
                    <div class="InfoFooter"><a href="#" class="text-decoration-none">Acerca de Alumni850.com</a></div>
                    <div class="InfoFooter"><a href="#" class="text-decoration-none">Servicio a empresas</a></div>
                    <div class="InfoFooter"><a href="#" class="text-decoration-none">Politicas</a></div>
                </div>

                <div class="divfooterDerecha">
                    <h3>Contacto</h3>
                    <div class="InfoFooter"><i class="fa fa-phone"></i> (+34)123-456-789</div>
                    <div class="InfoFooter"><i class="fa fa-info-circle"><a href="#" class="text-decoration-none"> info</a></i></div>
                    <div class="InfoFooter"><i class="fa fa-envelope"><a href="mailto:info@factoriaf5.org" class="text-decoration-none"> email</a></i></div>

                </div>

            </footer>




    </body>
</html>
