@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Lista de Perfiles</h2>
                </div>

                <div class="card -container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Sobre Mi</th>
                            <th scope="col">Web</th>
                            <th scope="col">Redes Sociales</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <th scope="row">{{$profile->id}}</th>
                                    <td>{{$profile->nickname}}</td>
                                    <td>{{$profile->aboutme}}</td>
                                    <td>{{$profile->web}}</td>
                                    <td>{{$profile->social}}</td>
                                    <td><a class="btn btn-warning bg-orange" href="{{route('profile.show', $profile->id)}}">
                                            <i class="nav-icon fas fa-eye"></i>
                                        </a></td>
                                    <td><a class="btn btn-warning bg-orange" href="{{route('profile.edit', $profile->id)}}">
                                            <i class="nav-icon fas fa-edit "></i>
                                        </a></td>

                                    <td>
                                        @can('haveaccess','ownprofile.destroy')
                                            <form action="{{route('profile.destroy', $profile->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning bg-orange">
                                                    <i class="nav-icon fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{url()->previous()}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
