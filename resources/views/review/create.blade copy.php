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
                        
                        <form action="{{Route('review.store')}}" method="POST">
                            <div class="form-group">
                                <label for="">Puntuación (1-5)</label>
                            <div id="rateYo"></div>
                        </div>

                        <div class="form-group">
                            <label for="">Comentario (opcional):</label>
                            <input type="text" class="form-control" name="feedback">
                            <input type="hidden" name="rating" id="rating">
                        </div>

                        <div class="text-right">
                            <a href="{{Route('review.create')}}" >
                                <input type="submit" value="Añadir review" class="btn btn-primary">
                            <a>
                        </div>
                        </form>
                        

                        
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>

</div>

@endsection