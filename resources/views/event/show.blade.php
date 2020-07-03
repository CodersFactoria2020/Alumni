@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Perfil de usuario</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <div class="container">
                            <h3>Información del evento</h3>
                            <p><strong>Nombre: </strong>{{$event->name}}</p>
                            <p><strong>Descripción: </strong>{{$event->description}}</p>
                            <p><strong>Lenguages: </strong>{{$event->lenguages}}</p>
                        
                            <p><strong>Creador del evento:
                                @foreach ($profiles as $profile)
                                    @if ($event->creator_id === $profile->id)                                    
                                        <li>{{$profile->nickname}} | <a href="{{route('profile.show', $profile->id)}}">Ver Perfil</a></li>
                                    @endif
                                @endforeach                              
                            </p>

                            <p><strong>Asistentes al evento:                                       
                                @foreach ($event->profiles as $profile)
                                    @if ($profile->id!=$event->creator_id)                                    
                                        <li>{{$profile->nickname}} | <a href="{{route('profile.show', $profile->id)}}">Ver Perfil</a> </li>
                                    @endif
                                @endforeach 
                            </p>

                         </div>
                    <hr>

                    <a class="btn btn-warning bg-orange" href="{{route('event.asist',[$event->id, Auth::user()->profile->id])}}">Asistir</a>
                    <a href="{{url()->previous()}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection