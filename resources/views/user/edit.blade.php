@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit User</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>

                            <hr>

                            <h3>Alumni Access</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access" id="access-yes" value="yes">
                                <label class="form-check-label" for="access-yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access" id="access-no" value="no">
                                <label class="form-check-label" for="access-no">No</label>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="roles"><h3>Role:</h3></label>

                                @if ($user->access === 'no')

                                    <input disabled type="text" class="form-control" id="roles" name="roles" value="{{$roles->name}}">
                                @else
                                    <select class="form-control" name="roles" id="roles">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"
                                                    @isset($user->roles[0]->name)
                                                    @if ($role->name == $user->roles[0]->name)
                                                    selected
                                                @endif
                                                @endisset
                                            >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <hr>

                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </form>
                    <hr>
                    <a href="{{route('user.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
