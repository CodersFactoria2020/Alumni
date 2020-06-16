@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Role</h2></div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3"></textarea>
                            </div>
                            
                            <hr>

                            <h3>Full Access</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="full-access" id="full-access-yes" value="yes">
                                <label class="form-check-label" for="full-access-yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="full-access" id="full-access-no" value="no" checked>
                                <label class="form-check-label" for="full-access-no">No</label>
                            </div>

                            <hr>

                            <h3>Permission List</h3>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}"  id="permission_{{$permission->id}}" name="permission[]">
                                    <label class="form-check-label" for="defaultCheck1">{{$permission->id}} - {{$permission->name}}</label>
                                </div>
                                @if ($permission->id%4==0)
                                    <br>
                                @endif
                            @endforeach
                            <hr>
                            <input class="btn btn-primary" type="submit" value="Create">
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