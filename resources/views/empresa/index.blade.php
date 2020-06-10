@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div class="card-body">
            <table class="table justify-content">
                <thead>
                <tr>
                    <th>Nobmre Empresa</th>
                    <th>Descripción</th>
                </tr>
                </thead>
                    <tbody>
                            @foreach($empresas as $empresa)
                        <tr>

                                <td>{{$empresa->name}}</td>
                                <td>{{$empresa->description}}</td>
                                <td>{{$empresa->logo}}</td>
                            @endforeach
                        </tr>
                    </tbody>
            </table>
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
@endsection
