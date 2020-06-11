@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$prueba->title}}</h3>
                        </div>
                        <div class="card-body">
                            {{$prueba->description}}
                        </div>
                        <div class="card-body">

                            <a href="">Ver archivo adjunto</a>

                            <!-- <input type="file" name="document" id="fileToUpload">
                            <br>
                            <input type="submit" value="Upload document" name="submit"> -->
                        </div>

                    </div>
                    
                </div>
                    
            </div>
        </div>
    </div>
</div>

@endsection