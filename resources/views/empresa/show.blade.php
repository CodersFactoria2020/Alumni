@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="text-right">
                    <a href="{{Route('empresa.edit', $empresa->id)}}" class="btn btn-secondary">
                        Editar
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>{{$empresa->name}}</h3>
                </div>
                <div class="card-body">
                    {{$empresa->description}}
                </div>
            </div>
        </div>
    </div>  
    <div>
        <div class="text-right">
            <a href="{{Route('prueba.create')}}" class="btn btn-secondary">
                Añadir prueba técnica
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
</div>
@endsection

