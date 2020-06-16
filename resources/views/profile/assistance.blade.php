@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Your assistances {{Auth::user()->profile->nickname}} </h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <div class="container">
                            <p><strong>Host: </strong></p>
                                @foreach ($events as $event)
                                    @if ($event->creator_id === Auth::user()->profile->id)                                    
                                        <li>{{$event->name}}</li>
                                    @endif
                                @endforeach       
                            <br>
                            <p><strong>Guest: </strong></p>
                                @foreach ($events as $event)
                                    @foreach ($event->profiles as $profile)
                                        @if ($profile->id === Auth::user()->profile->id AND $event->creator_id != Auth::user()->profile->id)                                    
                                            <li>{{$event->name}}</li>
                                        @endif
                                    @endforeach 
                                @endforeach 
                         </div>
                    <hr>
                    <a href="{{route('home')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection