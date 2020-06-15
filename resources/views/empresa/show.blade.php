@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card mt-4">
                    <div class="card-header">
                        <h3>{{$empresa->name}}</h3>
                    </div>
                    <div class="card-body">
                        {{$empresa->description}}
                    </div>
                    <div class="card-body">
                        <a href="{{Route('empresa.edit', $empresa->id)}}" class="stretched-link">
                            Editar
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                    <div>
                        <h4>Puntuación media</h4>
                        <h1>4.7</h1>
                        <p>{{$empresa->reviews->count()}} Reviews</p>

                        <a href="/review/create?empresa={{ $empresa->id }}" class=""> 
                        Añadir review
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>  

                <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                    <div>
                        <h4>Pruebas técnicas</h4>
                    </div>
                    <div class="text-right">
                        <a href="/prueba/create?empresa={{ $empresa->id }}" class="btn btn-primary"> <!-- aqui hemos añadido un href que fuciona -->
                            Añadir prueba técnica
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>    
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Documento</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach ($empresa->pruebas as $prueba)
                            <td><a href="{{Route('prueba.show', $prueba->id)}}">{{$prueba->title}}</a></td>
                            <td>{{$prueba->description}}</td>
                            <td>{{$prueba->document}}</td>
                            <td>{{$prueba->created_at}}</td>
                        </tr>
                    </tbody>
            
                    @endforeach
                </table>

            </div>  
        </div> 
    </div>
    
</div>
@endsection

