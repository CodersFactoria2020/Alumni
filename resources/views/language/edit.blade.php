@extends('layouts.app')

@section('content')
    <div class="col-8 m-auto">
            <form action="{{Route('language.update', $language->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="card text-white bg-dark mb-3" style="max-width: 40rem;">

                    <div class="card-header">
                        <label>Edit</label>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$language ?? ''->name}}"/>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>    
            </form>
        </div>
    </div>
@endsection