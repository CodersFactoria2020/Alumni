@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">
                  @include('custom.message')
                    

                    <form action="{{route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $role->name)}}">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug' , $role->slug)}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3">{{old('description', $role->description)}}</textarea>
                            </div>
                            
                            <hr>

                            <h3>Full Access</h3>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                @if ( $role['full-access']=="yes") 
                                checked 
                                @elseif (old('full-access')=="yes") 
                                checked 
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Yes</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                            
                                @if ( $role['full-access']=="no") 
                                checked 
                                @elseif (old('full-access')=="no") 
                                checked 
                                @endif 
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                            

                            <hr>
                        <p>Antiguos permisos: |
                            @foreach ($permission_role as $old)
                              {{$old}}|
                            @endforeach
                        </p>
                            <h3>Permission List</h3>
                            
                            @foreach ($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input"  type="checkbox"  id="permission_{{$permission->id}}" value="{{$permission->id}}"  name="permission[]"
                                    @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                                    checked

                                    @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
                                    checked

                                    @endif
                                    >
                                    <label class="custom-control-label" for="permission_{{$permission->id}}" >{{$permission->id}} - {{$permission->name}}
                                    <em>( {{ $permission->description }} )</em>
                                    </label>
                                </div>
                                @if ($permission->id%5==0)
                                    <br>
                                @endif
                            @endforeach
                            <hr>
                            <input class="btn btn-primary" type="submit" value="Update">
                            <a href="{{url()->previous()}}" class="btn btn-secondary" role="button" >Return</a>
                        </div>                        
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection