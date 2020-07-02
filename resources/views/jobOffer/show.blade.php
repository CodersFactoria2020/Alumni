@extends('layouts.app')

@section('content')
<div class="show-more container">
    
    <h3>{{$jobOffer->position}}</h3><br>

    
    <div class="field">
        <h5>Company</h5> 
        <p> {{$jobOffer->empresa->name}} </p> 
        <h5>Location</h5> 
        <p>{{$jobOffer->location}} </p>
        <h5> Description</h5> 
        <p>{{$jobOffer->description}} </p>
        
        @foreach($jobOffer->languages as $tag)
            <span class="tag-m"> {{$tag->name}} </span>
        @endforeach
       
    </div>
    
</div>
           

@endsection