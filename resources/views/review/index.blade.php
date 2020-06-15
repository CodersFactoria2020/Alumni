@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">

        <div class="text-right">
            <a href="{{Route('review.create')}}" >
                <input type="submit" value="Añadir puntuación" class="btn btn-primary" id="1">
            <a>
        </div> 

    </div>
        <div class="card-body">
            <table class="table justify-content">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Puntuación</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                <!-- puntuaciones-> -->
                    @foreach($reviews as $review)
                    <tr>
                        <td>
                            <input type="text" name="empresa_id" class="" value="Nombre de la empresa">
                        </td>
                        <td>{{$review->score}}</td>
                        <td>{{$review->comment}}</td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
</div>
@endsection
