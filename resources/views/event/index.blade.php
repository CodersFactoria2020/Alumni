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
                                    <td><a class="btn btn-info" href="{{route('event.show', $event->id)}}">Show</a>
                                    <td><a class="btn btn-warning" href="{{route('event.edit', $event->id)}}">Edit</a>
                                    <td>
                                        <form action="{{route('event.destroy', $event->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                </tr>                    
                            @endforeach                          
                        </tbody>
                      </table>
                      <a href="{{route('home')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
