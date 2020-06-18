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
                        
                            <p><strong>Owner:
                                @foreach ($profiles as $profile)
                                    @if ($event->creator_id === $profile->id)                                    
                                        <li>{{$profile->nickname}} | <a href="{{route('profile.show', $profile->id)}}">View profile</a></li>
                                    @endif
                                @endforeach                              
                            </p>

                            <p><strong>Assitants:                                       
                                @foreach ($event->profiles as $profile)
                                    @if ($profile->id!=$event->creator_id)                                    
                                        <li>{{$profile->nickname}} | <a href="{{route('profile.show', $profile->id)}}">View profile</a> </li>
                                    @endif
                                @endforeach 
                            </p>

                         </div>
                    <hr>

                    <a class="btn btn-success" href="{{route('event.asist',[$event->id, Auth::user()->profile->id])}}">Assist</a>
                    <a href="{{route('event.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection