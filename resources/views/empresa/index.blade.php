@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">

        <div class="text-right">
            <a href="{{Route('empresa.create')}}" >
                <input type="submit" value="Crear empresa" class="btn btn-primary">
            <a>
        </div>

    </div>
        <div class="card-body">  
            <table class="table justify-content">
                <thead>
                    <tr>
                        <th>Nombre Empresa</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($empresas as $empresa)
                    <tr>
                        <td>
                            <a href="{{Route('empresa.show', $empresa->id)}}">{{$empresa->name}}</a></td>
                        <td>{{$empresa->description}}</td>  
                        <td>
                            <a href="{{Route('empresa.edit', $empresa->id)}}" class="btn btn-secondary" >
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{Route('empresa.destroy', $empresa->id)}}" method="post">
                            @method('delete')
                            @csrf
                                <button class="btn btn-danger">
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
