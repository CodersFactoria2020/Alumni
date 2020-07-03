@extends('layouts.adminlte')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Editar Usuario</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                            </div>

                            <hr>

                            <h3>Acceso Total</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access" id="access-yes" value="yes">
                                <label class="form-check-label" for="access-yes">Si</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access" id="access-no" value="no">
                                <label class="form-check-label" for="access-no">No</label>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="roles"><h3>Rol:</h3></label>

                                @if(Auth::user()->id === $user->id)
                                    <input type="text" class="form-control" id="roles" name="roles" value="{{$user->currentRole()->id}}" placeholder="{{$user->currentRole()->name}}" readonly>
                                @endif

                                @if (Auth::user()->id != $user->id and Auth::user()->currentRole()->name === 'Admin')
                                    <select class="form-control" name="roles" id="roles">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"
                                            >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
    

                            </div>
                            <hr>
                            <input class="btn btn-warning bg-orange" type="submit" value="Actualizar">
                            <a href="{{route('home')}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
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
