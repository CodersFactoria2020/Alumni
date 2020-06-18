@extends('layouts.app')

@section('content')
<div class="card">
    <form action="{{Route('language.store')}}" method="POST">   
        @csrf
        <div class="card-header">
            Language 
        </div>
        <div class="card-body">    
            <div class="form-grup">
                <label>Name</label>
                <input type="text" name="name" class="form-control"/>
            </div>
        </div>
        <div class='card-footer'>
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>        
</div>
@endsection
