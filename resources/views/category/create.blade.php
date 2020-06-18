@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 m-4">
                <div class="card">
                    <form action="{{Route('category.store')}}" method="POST">   
                        @csrf
                        <div class="card-header">
                            Category 
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
            </div>  
        </div>
    </div>
@endsection
