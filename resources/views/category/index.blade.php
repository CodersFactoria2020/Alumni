@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 m-4">
                <div class="card">
                    <table class="table">
                            <div class="box">
                                <div class="box-header">

                                    <div class="text-center mt-3 mb-4">
                                        <a href="{{Route('category.create')}}" class="btn btn-primary rounded-pill"><i class="fa fa-plus"></i> New Category</a>
                                    </div>

                                    <div class="text-center">
                                        <form action ="{{ url('/busca') }}" method="get">

                                            <div class="col-3 input-group">
                                            
                                                <input type="search" class="form-control" name="busca" placeholder="Buscar">
                                                <div class="input-group-append">
                                        
                                                
                                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <!-- /.box-header -->

                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Created by</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($categories as $category)

                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="label label-success">Approved</span></td>
                                                    <td>
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <a href="{{Route('category.show', $category->id)}}" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                                <a href="{{Route('category.edit', $category->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                            </div>
                                                            <div class="btn-group" role="group" aria-label="Third group">
                                                                <form action="{{Route('category.destroy', $category->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">
                                                                </form>
                                                            </div>
                                                        </div>
                                                            
                                                    </td>
                                                </tr>
                                                
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
        </div>  

    </div>
    <!--<form action ="{{ url('/busca') }}" method="get">

        <div class="col-3 input-group mb-3">
            <input type="search" class="form-control" name="busca" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
            </div>
        </div>
    </form>-->
    
   
@endsection
