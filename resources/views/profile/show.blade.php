@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <div class="container">
                            <p><strong>Nickname: </strong>{{$profile->nickname}}</p>
                            <p><strong>Web: </strong>{{$profile->web}}</p>
                            <p><strong>About Me: </strong>{{$profile->aboutme}}</p>
                            <p><strong>Social: </strong>{{$profile->social}}</p>
                         </div>
                    <hr>
                    <a href="{{url()->previous()}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection