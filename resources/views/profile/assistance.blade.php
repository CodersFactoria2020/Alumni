@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>Asistentes {{Auth::user()->profile->nickname}} </h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="container">
                                <p><strong>As a Host: </strong></p>
                                    @foreach ($events as $event)
                                        @if ($event->creator_id === Auth::user()->profile->id)                                    
                                            <li>{{$event->name}} | <a href="{{route('event.show', $event->id)}}">Ver Evento</a></li>
                                        @endif
                                    @endforeach       
                                <br>
                                <p><strong>As a Guest: </strong></p>
                                    @foreach ($events as $event)
                                        @foreach ($event->profiles as $profile)
                                            @if ($profile->id === Auth::user()->profile->id AND $event->creator_id != Auth::user()->profile->id)                                    
                                                <li>{{$event->name}} | <a href="{{route('event.show', $event->id)}}">Ver Evento</a></li>
                                            @endif
                                        @endforeach 
                                    @endforeach 
                            </div>
                        <hr>
                        <a href="{{url()->previous()}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection