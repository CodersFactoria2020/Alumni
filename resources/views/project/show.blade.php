@extends('layouts.app')

@section('content')

    <projects-show-more :project="@json($project)"></projects-show-more>

@endsection
