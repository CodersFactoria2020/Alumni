@extends('layouts.app')

@section('content')
<div class="col-6 m-auto">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                </tr>
            </thead>

            <tbody>
                    <tr>
                        <td>{{$category->name}}</td>
                    </tr>
            </tbody>
        </table>
    </div>        
@endsection