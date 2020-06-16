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
                            <p><strong>Name: </strong>{{$user->name}}</p>
                            <p><strong>Email: </strong>{{$user->email}}</p>
                            <p><strong>Alumni access: </strong>{{$user->access}}</p>
                            <p><strong>Role: </strong>                                            
                                @isset($user->roles[0]->name)
                                    
                                    <a href="{{route('role.show',$user->roles[0]->id)}}" class="btn btn-info" role="button">{{$user->roles[0]->name}}</a>
                                @endisset
                            </p>
                            <p><strong>Full access: </strong>                                            
                                @isset($user->roles[0]['full-access'])
                                    {{$user->roles[0]['full-access']}}
                                @endisset
                            </p>
                            </p>
                         </div>
                    <hr>
                    <a href="{{route('user.index')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection