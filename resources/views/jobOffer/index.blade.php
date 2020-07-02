@extends('layouts.app')

@section('content')
    <offers-list :user_roles='@json($user_roles)'></offers-list>

@endsection