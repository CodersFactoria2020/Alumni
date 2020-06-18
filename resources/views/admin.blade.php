@extends('Panel.Layout.index')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('users', 'App\User')
                            <h3>{{$users->count()}}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('roles', 'App\Role')
                            <h3>{{$roles->count()}}</h3>
                            <p>Roles</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sitemap"></i>
                        </div>
                        <a href="{{route('role.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('profile', 'App\Profile')
                            <h3>{{$profile->count()}}</h3>
                            <p>Profiles</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-address-card"></i>
                        </div>
                        <a href="{{route('profile.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-grey">
                        <div class="inner">
                            @inject('events', 'App\Event')
                            <h3>{{$events->count()}}</h3>
                            <p>Events</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <a href="{{route('event.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>

        </div>
    </section>
</div>
@endsection

