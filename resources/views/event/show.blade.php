@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <div class="container">
                            <p><strong>Name: </strong>{{$event->name}}</p>
                            <p><strong>Description: </strong>{{$event->description}}</p>
                            <p><strong>Lenguages: </strong>{{$event->lenguages}}</p>
                         </div>
                    <hr>
                    <a class="btn btn-success" href="{{route('event.asist',['event_id'=> $event->id, 'profile_id'=>Auth::user()->profile->id])}}">Assist</a>
                    <a href="{{route('event.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection