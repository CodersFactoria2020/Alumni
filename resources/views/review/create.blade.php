@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">REVIEW</div>

                <div class="card-body">
                    <h4>Quiero añadir una review de esta empresa</h4>
                </div>

                <form action="{{Route('review.store')}}" method="post">
         
                 @csrf
                    <div class="card-body">
                    
                        <input type="hidden" name="empresa_id" class="" value="{{ $request->empresa }}">

                        <div class="form-group">
                            <label>Puntuación</label>
                                <select class="col-md-1 form-control" name="score" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>                            
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