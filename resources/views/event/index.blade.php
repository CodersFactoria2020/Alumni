@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Lista de eventos<h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Lenguages</th>
                          </tr>
                        </thead>
                        <tbody>                          
                            @foreach ($events as $event)
                                <tr>
                                    <th scope="row">{{$event->id}}</th>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->lenguages}}</td>
                                    <td><a class="btn btn-warning bg-orange" href="{{route('event.show', $event->id)}}">
                                            <i class="nav-icon fas fa-eye"></i>
                                        </a>
                                    <td><a class="btn btn-warning bg-orange" href="{{route('event.edit', $event->id)}}">
                                        <i class="nav-icon fas fa-edit "></i>
                                    </a>
                                    <td>
                                        <form action="{{route('event.destroy', $event->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning bg-orange">
                                            <i class="nav-icon fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                </tr>                    
                            @endforeach                          
                        </tbody>
                      </table>
                      <a href="{{url()->previous()}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
                     @can('haveaccess','event.create')
                          <a href="{{route('event.create')}}" class="btn btn-warning bg-orange">Crear Evento</a>
                     @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
