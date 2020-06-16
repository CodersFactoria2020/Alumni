@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome back {{ Auth::user()->name }}<h1>
                    @can('haveaccess', 'user.index')
                        <a href="{{route('user.index')}}" class="btn btn-secondary" role="button" >Users</a>
                    @endcan
                    @can('haveaccess', 'role.index')
                        <a href="{{route('role.index')}}" class="btn btn-secondary" role="button" >Roles</a>
                    @endcan
                    @can('haveaccess', 'profile.index')
                         <a href="{{route('profile.index')}}" class="btn btn-secondary" role="button" >Profiles</a>
                    @endcan
                    <hr>
                    <h2>User Data </h2>

                    <h4>Name: {{Auth::user()->name }}</h4>
                    <h4>Email: {{Auth::user()->email }}</h4>     
                    <h4>Role: {{Auth::user()->roles[0]->name }}</h4>
                    <a href="{{route('user.edit', Auth::user()->id)}}" class="btn btn-secondary" role="button" >Edit User</a>

                    <hr>
                    <h2>Profile Data </h2>
                    @isset(Auth::user()->profile->id)
                        <h4>Nickname: {{Auth::user()->profile->nickname}}</h4>
                        <h4>Web: {{Auth::user()->profile->web}}</h4>
                        <h4>About me: {{Auth::user()->profile->aboutme}}</h4>
                        <h4>Social: {{Auth::user()->profile->social}}</h4>
                        <a href="{{route('profile.edit', Auth::user()->profile->id)}}" class="btn btn-secondary" role="button" >Edit Profile</a>
                    @endisset
                    @if(!Auth::user()->profile)
                        <p> You don't have a profile yet.</p>
                        <a href="{{route('profile.create')}}" class="btn btn-secondary" role="button" >Create Profile</a>
                    @endif
                    <hr>
                    <h2>My Events: </h2>

                    @isset (Auth::user()->profile->id)
                        @isset($events)
                            @foreach ($events as $event)
                                @if ($event->creator_id===Auth::user()->profile->id)
                                    <h4>Name: {{$event->name}}</h4>
                                    <a href="{{route('event.edit', $event->id)}}" >Edit Event </a>
                                    <a href="{{route('event.show', $event->id)}}" >| View Event</a>
                                    <hr>
                                @endif
                            @endforeach
                        @endisset
                    @endisset

                    <a href="{{route('event.index')}}" class="btn btn-secondary" role="button" >Events</a>
                    <a href="{{route('event.create')}}" class="btn btn-secondary" role="button" >Create Event</a>

                    <a href="{{route('profile.assistance')}}" class="btn btn-secondary" role="button" >My assitance to events</a>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
