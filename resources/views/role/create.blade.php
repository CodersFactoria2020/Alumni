@extends('Panel.Layout.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Role</h2></div>

                <div class="card-body">
                  @include('custom.message')

                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">
                        <h3>Required data</h3>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug')}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3">{{old('description')}}</textarea>
                            </div>
                            
                            <hr>

                            <h3>Full Access</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                @if (old('full-access')=="yes") 
                                    checked 
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Yes</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                                @if (old('full-access')=="no") 
                                    checked 
                                @endif
                                @if (old('full-access')===null) 
                                    checked 
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>

          

                            <hr>

                            <h3>Permission List</h3>

                            @foreach ($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"   id="permission_{{$permission->id}}" value="{{$permission->id}}" name="permission[]"
                                    @if( is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                    checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="permission_{{$permission->id}}">{{$permission->id}} - {{$permission->name}}
                                    <em>( {{ $permission->description }} )</em>
                                    </label>
                                </div>
                                @if ($permission->id%5==0)
                                    <br>
                                @endif
                            @endforeach
                            <hr>
                            <input class="btn btn-primary" type="submit" value="Create">
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