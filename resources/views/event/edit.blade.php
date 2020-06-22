@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Event</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('event.update', $event->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$event->name}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" placeholder="{{$event->description}}" name="description" id="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="lenguages">Lenguages:</label>
                                <textarea class="form-control" placeholder="{{$event->lenguages}}" name="lenguages" id="lenguages" rows="3"></textarea>
                            </div>

                            <hr>
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>                        
                    </form>
                    <hr>
                    <a href="{{url()->previous()}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection