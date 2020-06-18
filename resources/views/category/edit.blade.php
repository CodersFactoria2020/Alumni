@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 m-4">
                <div class="card">
                    <form action="{{Route('category.update', $category->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-header">
                            <label>Edit</label>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
@endsection