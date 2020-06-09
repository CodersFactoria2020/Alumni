@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Aquí se vería el listado de empresas
                </div>





                    <!-- BOTÓN IR A CREAR EMPRESA -->
                <div class="text-center">
                    <a href="{{Route('empresa.create')}}" >
                        <input type="submit" value="Crear empresa" class="btn btn-primary">
                    <a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
