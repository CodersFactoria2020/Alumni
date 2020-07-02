@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>Editar Perfil</h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('profile.update', Auth::user()->profile->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container">
                                <div class="form-group">
                                    <label for="nickname">Nickname:</label>
                                    <input type="text" class="form-control" id="name" name="nickname" value="{{Auth::user()->profile->nickname}}">
                                </div>

                                <div class="form-group">
                                    <label for="web">Web:</label>
                                    <input type="text" class="form-control" id="web" name="web" value="{{Auth::user()->profile->web}}">
                                </div>

                                <div class="form-group">
                                    <label for="aboutme">Sobre mi:</label>
                                    <textarea class="form-control" placeholder="{{Auth::user()->profile->aboutme}}" name="aboutme" id="aboutme" rows="3"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="aboutme">Social:</label>
                                    <textarea class="form-control" placeholder="{{Auth::user()->profile->social}}" name="social" id="social" rows="3"></textarea>
                                </div>
                        
                                <hr>
                                <input class="btn btn-warning bg-orange " type="submit" value="Actualizar">
                                <a href="{{url()->previous()}}" class="btn btn-warning bg-orange role="button" >Volver</a>
                            </div>                        
                        </form>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection