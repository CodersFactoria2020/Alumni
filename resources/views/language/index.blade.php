@extends('layouts.app')

@section('content')

<div class="text-center mt-3 mb-4">
    <a href="{{Route('language.create')}}">
        <button class="btn btn-success">New Language</button>
    </a>
 </div>
<div class="col-8 m-auto">
    <table class="table">
        <thead class="thead-dark">

            <tr>
            <th scope="col">ID</th>
            <th scope="col">Language</th>
            <th scope ="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <th scope="row">{{$language->id}}</th>
                    <td>{{$language->name}}</td>
                    <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                               <div class="btn-group mr-2" role="group" aria-label="First group">
                                 <a href="{{Route('language.show', $language->id)}}" class="btn btn-secondary">Show</a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <a href="{{Route('language.edit', $language->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <form action="{{Route('language.destroy', $language->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value ="Delete" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        
                        </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
</div>
@endsection
