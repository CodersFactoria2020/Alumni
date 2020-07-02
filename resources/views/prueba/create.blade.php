@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">PRUEBA TÉCNICA</div>

                <div class="card-body">
                    <p><!-- prueba->empresa->name --> </p>
                </div>

                <form action="{{Route('prueba.store')}}" method="post" enctype="multipart/form-data" name="">
         
                 @csrf
                    <div class="card-body">
                    
                        <input type="hidden" name="empresa_id" class="" value="{{ $request->empresa }}">

                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            Adjunta documento (opcional)
                            <input type="file" name="document" id=""/>
                        </div>

                        <div class="text-right">
                            <a href="{{Route('prueba.create')}}" >
                                <input type="submit" value="Añadir prueba técnica" class="btn btn-primary">
                            <a>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

</div>

@endsection