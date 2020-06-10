@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Aquí se vería CREATE empresa
                </div>

                <form action="{{Route('empresa.store')}}" method="post" enctype="multipart/form-data"> <!-- enctype para subir el logo -->
                 @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            Selecciona logo de la empresa (opcional)
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </div> -->

                        <div class="text-right">
                            <a href="{{Route('empresa.create')}}" >
                                <input type="submit" value="Crear" class="btn btn-primary">
                            <a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection