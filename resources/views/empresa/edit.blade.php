@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mt-4">
                <div class="card-header">
                    EDITAR FICHA DE EMPRESA
                </div>

                <form action="{{Route('empresa.update', $empresa->id)}}" method="post"> <!-- enctype para subir el logo -->
                 @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{$empresa->name}}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            
                            <input type="text" name="description" class="form-control" value="{{$empresa->description}}">
                        </div>
                        <!-- <div class="form-group">
                            Selecciona logo de la empresa (opcional)
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </div> -->

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
