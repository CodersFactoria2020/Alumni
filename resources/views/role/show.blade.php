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

                         <div class="container">
                            <p><strong>Name: </strong>{{$role->name}}</p>
                            <p><strong>Slug: </strong>{{$role->slug}}</p>
                            <p><strong>Description: </strong>{{$role->description}}</p>
                            <p><strong>Full-access: </strong>{{$role['full-access']}}</p>
                            <p><strong>Permissions: </strong>
                                @foreach ($permission_role as $i)
                                    <li>{{$permissions[$i-1]->name}}</li>
                                @endforeach
                            </p>
                         </div>
                    <hr>
                    <a href="{{route('role.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection