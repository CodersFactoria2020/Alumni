@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mt-4">
                <div class="card-header">
                    EDITAR PRUEBA
                </div>

                <form action="{{Route('prueba.update', $prueba->id)}}" method="post"> <!-- enctype para subir el logo -->
                 @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control" value="{{$prueba->title}}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            
                            <input type="text" name="description" class="form-control" value="{{$prueba->description}}">
                        </div>

                        <div class="text-right">
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
