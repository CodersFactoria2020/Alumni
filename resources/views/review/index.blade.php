@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/empresa">
        < Volver
        <i class="fas fa-plus"></i>
    </a>
    
    <div class="card-body">
        
        <div>
            <h4>Nombre empresa</h4><!-- review->empresa_id->name -->
            <p>Listado de reviews</p>
        </div>
    </div>

    
    <div class="card-body">
        <table class="table justify-content">
            <thead>
                <tr>
                    <th>Puntuación</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>    
                    <td>{{$review->score}}</td>
                    <td>{{$review->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
</div>
@endsection
