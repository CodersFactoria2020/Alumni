@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List of users</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alumni Access</th>
                            <th scope="col">Role(s)</th>
                            <th scope="col">Full Access</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->access}}</td>
                                    <td>
                                        @isset ($user->roles[0]->name)
                                            {{$user->roles[0]->name}}
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($user->roles[0]['full-access'])
                                            {{$user->roles[0]['full-access']}}
                                        @endisset
                                    </td>
                                    <td>
                                        @can('view',[$user, ['user.show','userown.show'] ])
                                        <a class="btn btn-info" href="{{route('user.show', $user->id)}}">Show</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('view', [$user, ['user.edit','userown.edit'] ])
                                        <a class="btn btn-warning" href="{{route('user.edit', $user->id)}}">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess','user.destroy')
                                            <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        @endcan
                                    </td>
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

