@extends('layouts.app')

@section('content')

    <projects-list :user_roles='@json($user_roles)'></projects-list>

@endsection
