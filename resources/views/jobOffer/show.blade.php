@extends('layouts.app')

@section('content')

<h5>{{$jobOffer->position}}</h5><br>
<h5>Company:</h5> {{$jobOffer->empresa->name}} <br>
<h5>Location:</h5> {{$jobOffer->location}} <br>
<h5>Description:</h5> {{$jobOffer->description}} <br>
@foreach($jobOffer->languages as $tag)
    <span> {{$tag->name}}, </span>
@endforeach
           

@endsection