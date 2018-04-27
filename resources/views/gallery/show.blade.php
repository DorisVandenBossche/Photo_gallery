@extends('layouts.main')


@section('content') <br> 

  <div class="callout primary">
    <article class="grid-container">
    	 <a href="/">Back To Galleries</a>
      <div class="">
        <h1>{{$gallery->name}}</h1>
        <p class="lead">{{$gallery->description}}</p>
          <?php if(Auth::check()) : ?>
        <a class="button button-upload" href="/photo/create/{{$gallery->id}}">Upload Photo</a>
      <?php endif; ?>
      </div>
    </article>
  </div>


  <article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
    		<?php foreach($photos as $photo) : ?>
    			<div class="cell">
    				<a href="/photo/details/{{$photo->id}}">
    					<img class="thumbnail" src="/image/{{$photo->image}}">
    				</a>
    				<h5>{{$photo->title}}</h5>
    				<p>{{$photo->description}}</p>

          <!--<form action="/gallery/{{$gallery->id}}" class="pull-xs-right5 card-link" method="POST" style="display: inline;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input class="alert button" type="submit" value="Delete">
          </form>-->
    			</div>
    		<?php endforeach; ?>
    </div>
</article>
@stop