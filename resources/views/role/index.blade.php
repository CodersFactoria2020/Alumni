@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>List of roles<h2></div>
                    

                <div class="card-body">
                @can('haveaccess','role.create')
                    <a href="{{route('role.create')}}" class="btn btn-success float-right">Create</a>
                    <br><br>
                @endcan

                    @include('custom.message')


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Full access</th>
                            <th colspan="3"></th>
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
                                        <a class="btn btn-info" href="{{route('role.show', $role->id)}}">Show</a>
                                    @endcan
                                    </td>
                                    <td>
                                    @can('haveaccess','role.edit')
                                        <a class="btn btn-warning" href="{{route('role.edit', $role->id)}}">Edit</a>
                                    @endcan
                                    </td>
                                    <td>
                                    @can('haveaccess','role.destroy')
                                        <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                    </td>

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