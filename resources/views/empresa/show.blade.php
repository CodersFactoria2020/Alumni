@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{Route('empresa.index')}}">
        < Volver al listado de empresas
        <i class="fas fa-plus"></i>
    </a>

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
                        <a type="button" class="" data-toggle="modal" data-target="#edit-modal-company">
                            Editar
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                    <div>
                        <h4>Puntuación media</h4>
                        <h1>{{round($empresa->reviews->AVG('score'),1,PHP_ROUND_HALF_EVEN)}}</h1>
                        <p>
                            <a href="/review?empresa={{ $empresa->id }}"> {{$empresa->reviews->count()}} Reviews</a>
                        </p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal-review">
                            Añadir review
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                    <div>
                        <h4>Pruebas técnicas</h4>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
                          Añadir prueba técnica
                        </button>

                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach ($empresa->pruebas as $prueba)
                            <td><a class="selector" href="{{Route('prueba.show', $prueba->id)}}">{{$prueba->title}}</a></td>
                            <td>{{$prueba->description = substr($prueba->description, 0, 30) . '...'}}</td>
                            <td>{{$prueba->created_at}}</td>
                                <td>
                                    <a class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal">
                                        Editar
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </td>
                            <td>
                                <form action="{{Route('prueba.destroy', $prueba->id)}}" method="post">
                                @csrf
                                    @method('delete')

                                    <button class="btn btn-danger">
                                        Eliminar
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    </tbody>

                    @endforeach
                </table>

            </div>
        </div>
    </div>

</div>
@include('prueba.modal-create')
@include('prueba.modal-edit')
@include('empresa.modal-edit')
@include('review.modal-create')
@endsection
