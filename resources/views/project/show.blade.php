@extends('layouts.app')

@section('content')

    <h5>{{$project->title}}</h5><br>
    <h5>Descripción:</h5> {{$project->description}} <br>
    <h5>Repositorio:</h5> {{$project->repository}} <br>
    <h5>Estado:</h5> {{$project->status}} <br>
    <h5>Nombre de Usario:</h5> {{$project->username}} <br>
    <h5>E-mail:</h5> {{$project->email}} <br>
    <h5>Etiquetas: </h5>
    @foreach($project->languages as $tag)
        <span> {{$tag->name}}, </span>
    @endforeach
    <h5>Creado: </h5> {{$project->created_at}} <br> 
    <h5>Actualizado: </h5> {{$project->updated_at}} <br>

@endsection
