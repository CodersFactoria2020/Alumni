@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of events<h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Lenguages</th>
                            <th colspan="3">Actions</th>
                          </tr>
                        </thead>
                        <tbody>                          
                            @foreach ($events as $event)
                                <tr>
                                    <th scope="row">{{$event->id}}</th>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->lenguages}}</td>
                                    <td><a class="btn btn-info" href="{{route('event.show', $event->id)}}">
                                        <svg class="bi bi-eye-fill" width="0.5cm" height="0.5cm" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </a>
                                        <td><a class="btn btn-info" href="{{route('event.asist',[$event->id, Auth::user()->profile->id])}}">
                                        Asist
                                        </a>
                                 
                                </tr>                    
                            @endforeach                          
                        </tbody>
                      </table>
                      <a href="{{url()->previous()}}" class="btn btn-secondary" role="button" >Return</a>
                     @can('haveaccess','event.create')
                          <a href="{{route('event.create')}}" class="btn btn-success">Create Event</a>
                     @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection