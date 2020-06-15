@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">REVIEW</div>

                <div class="card-body">
                    <h4>Quiero añadir una review: puntuación + comentario opcinal </h4>
                </div>

                <form action="{{Route('review.store')}}" method="post">
         
                 @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Empresa:</label>
                            <input type="text" name="empresa_id" class="" value="{{ $request->empresa }}">
                        </div>
                        <div class="form-group">
                            <label>Puntuación</label>
                            <input type="number" name="score" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Comentario (opcional)</label>
                            <textarea type="text" name="comment" class="form-control"></textarea>
                        </div>
                        

                        <div class="text-right">
                            <a href="{{Route('review.create')}}" >
                                <input type="submit" value="Añadir review" class="btn btn-primary">
                            <a>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

</div>

@endsection