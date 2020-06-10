@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-right">
                    <a>
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </a>
                </div>
            </div>

            <div class="card">
            
                @foreach($empresas as $empresa)
                <div class="card-header">
                    <h3>{{$empresa->name}}</h3>
                </div>

                <div class="card-body">
                    {{$empresa->description}}
                </div>

                @endforeach
                
            </div>
        </div>
    </div>
</div>

@endsection