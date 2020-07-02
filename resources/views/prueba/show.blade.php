@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{Route('empresa.show', $prueba->empresa->id)}}">
        < Volver a ficha de empresa
        <i class="fas fa-plus"></i>
    </a>

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mt-4">

                <div class="card-header">
                    <h3>{{$prueba->title}}</h3>
                </div>
                <div class="card-body">
                    {{$prueba->description}}
                </div>
                <div class= "my-1 mx-3">
                    Aportado por: Nombre del coder<!-- nombre de usuario prueba->user->name -->
                </div>
                <div class= "my-1 mx-3">
                    Fecha de creación: {{$prueba->created_at}}
                </div>

                <div class="card-body">
                        <a href="{{Route('prueba.edit', $prueba->id)}}" class="">
                            Editar
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                <div class="card-body row">  
                    <div class= "my-2 mx-3">
                    {{$prueba->document}}
                    </div>
                    <a href="{{Route('download-document', $prueba->id)}}">
                        <button type="button" class="btn btn-primary text-right">
                            Download
                        </button>
                    </a> 
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection