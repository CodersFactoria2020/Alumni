@extends('Panel.Layout.index')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>User: {{$user->name}}</h2></div>

                <div class="card-body">
                   @include('custom.message')

                    <form action="{{ route('user.update', $user->id)}}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="container">


                      <h3>User data</h3>
                      <div class="form-group">                            
                        <p><strong>Name:</strong> {{($user->name)}}</p>
                        <p><strong>Mail:</strong> {{($user->email)}}</p>
                        <p><strong>Role:</strong> {{($user->roles[0]->name)}}</p>
                      </div>

                          <h3>Profile data</h3>
                          <div class="form-group">                            
                            <p><strong>Nickname:</strong> {{($user->profile->nickname)}}</p>
                            <p><strong>My web:</strong> {{($user->profile->web)}}</p>
                            <p><strong>About me:</strong> 
                              <br>
                              {{($user->profile->aboutme)}}</p>                           
                            <p><strong>Scoial:</strong> {{($user->profile->social)}}</p>
                          </div>

                          <hr>  

                          <a class="btn btn-info" href="{{route('profile.show',$user->profile->id)}}">View perfil</a>
                          <a class="btn btn-success" href="{{route('user.edit',$user->id)}}">Edit</a>
                          <a class="btn btn-danger" href="{{route('user.index')}}">Back</a>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection