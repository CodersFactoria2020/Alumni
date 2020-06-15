@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">

        <div class="text-right">
            <a href="{{Route('prueba.create')}}" >
                <input type="submit" value="Añadir prueba técnica" class="btn btn-primary" id="">
            <a>
        </div>

    </div>
        <div class="card-body">
            <table class="table justify-content">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Documentos</th>
                    </tr>
                </thead>
                <tbody>
                <!-- empresa-> -->
                    @foreach($pruebas as $prueba)
                    <tr>
                        <td>
                            <a href="{{Route('prueba.show', $prueba->id)}}">{{$prueba->title}}</a>
                        </td>
                        <td>{{$prueba->description}}</td>
                        <td>{{$prueba->document}}</td>
                        <td>
                            <form action="{{Route('prueba.destroy', $prueba->id)}}" method="post">
                            @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    Eliminar
                                <i class="far fa-trash-alt"></i>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
</div>
@endsection
