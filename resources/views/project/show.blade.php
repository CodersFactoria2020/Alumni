@extends('layouts.app')

@section('content')
<div class="show-more container">
    <h3>{{$project->title}}</h3> <br>

    <div class="field">
        <h5>Descripción</h5> 
        <p>{{$project->description}} </p>
        <h5>Repositorio</h5> 
        <p>{{$project->repository}} </p>
        <h5>Estado</h5> 
        <p>{{$project->status}} </p>
        <h5>Nombre de Usario</h5> 
        <p>{{$project->username}} </p>
        <h5>E-mail</h5> 
        <p>{{$project->email}}</p> 
        <h5>Creado </h5> 
        <p>{{$project->created_at}}</p>  
        <h5>Actualizado </h5> 
        <p>{{$project->updated_at}}</p> 
        @foreach($project->languages as $tag)
            <span class="tag-m"> {{$tag->name}} </span>
        @endforeach
    </div>
</div>

@endsection
