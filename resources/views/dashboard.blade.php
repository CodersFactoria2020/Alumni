@extends('Dashboard.Layout.index')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-6">
                    <h2><strong>User Data </strong></h2>
                    <h4><strong>Name: </strong>{{Auth::user()->name }}</h4>
                    <h4><strong>Email: </strong>{{Auth::user()->email }}</h4>     
                    <h4><strong>Role: </strong>
                        @isset (Auth::user()->roles[0]->name)
                            {{Auth::user()->roles[0]->name}}
                        @endisset                          
                    </h4>
                    <a href="{{route('user.edit', Auth::user()->id)}}" class="btn btn-secondary" role="button" >Edit User</a>
                    <hr>
                    <h2><strong>Profile Data</strong></h2>
                    @isset(Auth::user()->profile->id)
                        <h4><strong>Nickname: </strong> {{Auth::user()->profile->nickname}}</h4>
                        <h4><strong>Web: </strong>{{Auth::user()->profile->web}}</h4>     
                        <h4><strong>About me: </strong>{{Auth::user()->profile->aboutme}}</h4>
                        <h4><strong>Social: </strong>{{Auth::user()->profile->social}}</h4>
                        <a href="{{route('profile.edit', Auth::user()->profile->id)}}" class="btn btn-secondary" role="button" >Edit Profile</a>
                    @endisset
                    @if(!Auth::user()->profile)
                        <p> You don't have a profile yet.</p>
                        <a href="{{route('profile.create')}}" class="btn btn-secondary" role="button" >Create Profile</a>
                    @endif       
                    <hr>

                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('events', 'App\Event')
                            <h3>{{$events->count()}}</h3>
                            <p>Events</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                          <a href="{{route('event.index')}}" class="small-box-footer">See all events<i class="fa fa-arrow-circle-right"></i></a>
                          <a href="{{route('event.create')}}" class="small-box-footer">Create an event<i class="fa fa-arrow-circle-right"></i></a>
                          <a href="{{route('profile.assistance')}}" class="small-box-footer">View my assistance<i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>
        </div>
    </section>
</div>
@endsection

