@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="d-flex justify-content-between align-self-center mt-5 mb-4">
                <div>
                    <h4>Empresas</h4>
                    <p>En esta sección las/os coders podrán añadir empresas en las que hayan trabajado. 
                    Mediante su descripción, puntuación y pruebas técnicas ayudará a otras/os coders a elegir puestos de trabajo.</p>
                </div>
                <div class="text-right">
                    <a href="{{Route('empresa.create')}}" >
                        <input type="submit" value="Añadir empresa" class="btn btn-primary">
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Descripción</th>      
                        <th></th>  
                        <th></th>    
                    </tr>
                </thead>
                <tbody>
                     @foreach($empresas as $empresa)
                    <tr>
                        <td>
                            <a href="{{Route('empresa.show', $empresa->id)}}">{{$empresa->name}}</a>
                        </td>
                        <td>
                            <p> {{$empresa->description = substr($empresa->description, 0, 50) . '...'}}
                            <p>
                        </td>
                        <td>
                            <a href="{{Route('empresa.edit', $empresa->id)}}" class="btn btn-secondary">
                                Editar
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{Route('empresa.destroy', $empresa->id)}}" method="post">
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
        </div>           
        </div>
</div>
@endsection
