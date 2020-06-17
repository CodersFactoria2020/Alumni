@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">REVIEW</div>

                    Aquí yo escribo algo aparece

                    {{$review->score}}
                    {{$review->comment}}




            </div>
        </div>
    </div>

</div>

@endsection
