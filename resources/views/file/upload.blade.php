@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"> <!-- justify-content-center -->
        <div class="col-md-6 col-md-offset">
            <div class="card">
                <div class="card-header">
                    <h5>File Upload</h5>
                    <div class="card-body">
                        <form action="{{ route('uploadfile') }}" method="post" enctype="mulipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="{{ route('viewfile') }}" class="btn btn-success">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


