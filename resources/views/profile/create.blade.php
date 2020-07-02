@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Perfil</h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('profile.store')}}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label for="nickname">Nickname :</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname">
                                </div>

                                <div class="form-group">
                                    <label for="web">Web:</label>
                                    <input type="text" class="form-control" id="web" name="web" placeholder="Your personal web">
                                </div>

                                <div class="form-group">
                                    <label for="aboutme">Sobre mi:</label>
                                    <textarea class="form-control" placeholder="Tell the community a bit from you..." name="aboutme" id="BOUTME" rows="3"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="social">Redes Sociales:</label>
                                    <textarea class="form-control" placeholder="Social network" name="social" id="social" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="user_id">Usuario:</label>
                                    <input class="form-control" value="{{Auth::user()->id}}" name="user_id" id="user_id" rows="3" readonly></textarea>
                                </div>

                                <hr>
                                <input class="btn btn-warning bg-orange" type="submit" value="Crear Perfil">
                                <a href="{{url()->previous()}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
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