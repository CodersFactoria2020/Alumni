@extends('layouts.adminlte')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card">
                <div class="card-header">
                    <h2>Listado de usuarios</h2>
                </div>

                    <div class="card-body" >
                        @include('custom.message')

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alumni-Acceso</th>
                                <th scope="col">Rol</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->access}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{$role->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('view',[$user, ['user.show','userown.show'] ])
                                            <a class="btn btn-warning bg-orange" href="{{route('user.show', $user->id)}}">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('view', [$user, ['user.edit','userown.edit'] ])
                                            <a class="btn btn-warning bg-orange" href="{{route('user.edit', $user->id)}}">
                                                <i class="nav-icon fas fa-edit "></i>
                                            </a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess','user.destroy')
                                                <form action="{{route('user.destroy', $user->id)}}" method="POST">
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
                        <a href="{{route('user.index')}}" class="btn btn-warning bg-orange" role="button" >Volver</a>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

