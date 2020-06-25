@extends('Panel.Layout.index')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!--<div class="col-md-8"> ESA CLASE ROMPE EL FOOTER-->
            <div class="card">
                <div class="card-header">
                    <h2>List of users</h2>
                </div>

                <div class="card-body" >
                    @include('custom.message')

                    <table class="table">
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
                                        {{$user->currentRole()->name}}
                                    </td>
                                    <td>
                                        @isset($user->roles[0]['full-access'])
                                            {{$user->roles[0]['full-access']}}
                                        @endisset
                                    </td>
                                    <td>
                                        @can('view',[$user, ['user.show','userown.show'] ])
                                        <a class="btn btn-info" href="{{route('user.show', $user->id)}}">
                                            <svg class="bi bi-eye-fill" width="0.5cm" height="0.5cm" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                        </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('view', [$user, ['user.edit','userown.edit'] ])
                                        <a class="btn btn-warning" href="{{route('user.edit', $user->id)}}">
                                            <svg class="bi bi-pencil-square" width="0.5cm" height="0.5cm" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                        </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess','user.destroy')
                                            <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <a href="{{url()->previous()}}" class="btn btn-secondary" role="button" >Return</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

