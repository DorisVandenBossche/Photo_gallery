@extends('layouts.main')


@section('content') <br> 

  <div class="callout primary">
      <div class="row column">
        <a href="/gallery/show/{{$photo->gallery_id}}">Back to Gallery</a>
        <h1>{{$photo->title}}</h1>
        <p class="lead">{{$photo->description}}</p>
        <p>Location: {{$photo->location}}</p>
      </div>
  </div>
  <article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
      <div class="main">
      	 <img src="/image/{{$photo->image}}">
      </div>
    </div>
</article>
@stop