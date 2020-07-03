@extends('layouts.adminlte')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header"><h2>Lista de Roles<h2></div>
                    <div class="card-body">
                        @include('custom.message')
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Full access</th>
                            </tr>
                            </thead>
                            <tbody>


                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{$role->id}}</th>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>{{$role->description}}</td> 
                                        <td>{{$role['full-access']}}</td> 
                                        <td>
                                        @can('haveaccess','role.show')
                                            <a class="btn btn-warning bg-orange" href="{{route('role.show', $role->id)}}">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                        @endcan
                                        </td>
                                        <td>
                                        @can('haveaccess','role.edit')
                                            <a class="btn btn-warning bg-orange" href="{{route('role.edit', $role->id)}}">
                                                <i class="nav-icon fas fa-edit "></i>
                                            </a>
                                        @endcan
                                        </td>
                                        <td>
                                        @can('haveaccess','role.destroy')
                                            <form action="{{route('role.destroy', $role->id)}}" method="POST">
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
                            @can('haveaccess','role.create')
                                <a href="{{route('role.create')}}" class="btn btn-warning bg-orange">Crear Rol</a>
                            @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection