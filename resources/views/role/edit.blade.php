@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$role->slug}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" placeholder="{{$role->description}}" name="description" id="description" rows="3"></textarea>
                            </div>
                            
                            <hr>

                            <h3>Full Access</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="full-access" id="full-access-yes" value="yes">
                                <label class="form-check-label" for="full-access-yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="full-access" id="full-access-no" value="no">
                                <label class="form-check-label" for="full-access-no">No</label>
                            </div>

                            <hr>
                        <p>Antiguos permisos: |
                            @foreach ($permission_role as $old)
                              {{$old}}|
                            @endforeach
                        </p>
                            <h3>Permission List</h3>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}"  id="permission_{{$permission->id}}" name="permission[]">
                                    <label class="form-check-label" >{{$permission->id}} - {{$permission->name}}</label>
                                </div>
                                @if ($permission->id%5==0)
                                    <br>
                                @endif
                            @endforeach
                            <hr>
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>                        
                    </form>
                    <hr>
                    <a href="{{route('role.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection