@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of profiles</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">About Me</th>
                            <th scope="col">Web</th>
                            <th scope="col">Social</th>
                            <th colspan="3">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <th scope="row">{{$profile->id}}</th>
                                    <td>{{$profile->nickname}}</td>
                                    <td>{{$profile->aboutme}}</td>
                                    <td>{{$profile->web}}</td>
                                    <td>{{$profile->social}}</td>
                                    <td><a class="btn btn-info" href="{{route('profile.show', $profile->id)}}">Show</a>
                                    <td><a class="btn btn-warning" href="{{route('profile.edit', $profile->id)}}">Edit</a>
                                    <td>
                                        <form action="{{route('profile.destroy', $profile->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <a href="{{route('home')}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
