@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <h1>Bienvenido {{ Auth::user()->name }}</h1>
            <div class="col-md-12 card-home">
            <p>Alumni es una espacio para ti, coder. Durante y despues de la formación podràs
            empezar a introducirte en el mundo laboral dentro del sector del desarollo gracias a esta
            plataforma. Crea tu perfil profesional, descubre las empresas mas destacadas del sector.
            Busca en nuestra borsa de empleo la ofertas de trabajo que mas se adpten a tus
            necessidades y compartelas con los demas coders. Participa en el foro y manten activa la
            comunicacio con nuetra comunida de desarolladores, organiza y participa en eventos que
            ampiaran tus conocimientps y esxperienca en el campo del desarollo. Sumergete en alumni
            a provechete de todo lo que te ofrece. Al ataque! </p>
            </div>
            <div class="col-md-12 homeimg">
                <div class="col-md-4 boximg">
                    <img src="{{ asset('images/ofertas_empleo.jpg') }}" alt="">
                    <h3>Proyectos</h3>
                    <p>Particpa y comparte tus proyectos<br>
                    con los demas coders</p><br>
                    <a href="{{Route('projects.index')}}"><input class="button" type="submit" value="Más informacion"></a>

                </div>
                <div class="col-md-4 boximg">
                    <img src="{{ asset('images/ofertas_empleo2.jpg') }}" alt="">
                    <h3>Ofertas de Empleo</h3>
                    <p> Busca en nuestra borsa de trabajo y<br>
                    ofrece la mejor candidatura</p><br>
                    <a href="{{Route('jobOffers.index')}}"><input class="button" type="submit" value="Más informacion"></a>
                </div>
                <div class="col-md-4 boximg">
                    <img src="{{ asset('images/ofertas_empleo3.jpg') }}" alt="">
                    <h3>Foro</h3>
                    <p>Comparte tus ideas,<br>
                    debate las propuestas en el Foro</p><br>
                    <a href="{{Route('foro.index')}}"><input class="button" type="submit" value="Más informacion"></a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
