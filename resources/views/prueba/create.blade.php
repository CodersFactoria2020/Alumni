@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prueba técnica</div>

                <div class="card-body">
                    Voya añadir una prueba técnica
                </div>

                <form action="{{Route('prueba.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                 @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        Adjunta documento (opcional)
                            <input type="file" name="document" id="fileToUpload">
                            <br>
                            <input type="submit" value="Upload document" name="submit">
                        </div>

                        <div class="text-right">
                            <a href="{{Route('prueba.create')}}" >
                                <input type="submit" value="Añadir" class="btn btn-primary">
                            <a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection