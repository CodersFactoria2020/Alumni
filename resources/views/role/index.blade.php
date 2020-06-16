@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of roles<h2>
                    <h4><a class="btn btn-success" href="{{route('role.create')}}">Add new role</a><h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Full-acces</th>
                            <th colspan="3">Action</th>
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
                                    <td><a class="btn btn-info" href="{{route('role.show', $role->id)}}">Show</a>
                                    <td><a class="btn btn-warning" href="{{route('role.edit', $role->id)}}">Edit</a>
                                    <td>
                                        <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                </tr>                    
                            @endforeach                          
                        </tbody>
                      </table>
                      <a href="{{route('home')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection