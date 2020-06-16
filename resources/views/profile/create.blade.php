@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label for="nickname">Nickname :</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname">
                            </div>

                            <div class="form-group">
                                <label for="web">Web:</label>
                                <input type="text" class="form-control" id="web" name="web" placeholder="Your personal web">
                            </div>

                            <div class="form-group">
                                <label for="aboutme">About me:</label>
                                <textarea class="form-control" placeholder="Tell the community a bit from you..." name="aboutme" id="BOUTME" rows="3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="social">Social:</label>
                                <textarea class="form-control" placeholder="Social network" name="social" id="social" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="user_id">User id:</label>
                                <input class="form-control" value="{{Auth::user()->id}}" name="user_id" id="user_id" rows="3" readonly></textarea>
                            </div>

                            <hr>
                            <input class="btn btn-primary" type="submit" value="Create">
                        </div>                        
                    </form>
                    <hr>
                    <a href="{{route('home')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
