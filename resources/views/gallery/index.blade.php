@extends('layouts.main')


@section('content') <br> 

  <div class="callout primary">
    <article class="grid-container">
      <div class="">
        <h1>Photo Galleries</h1>
        <p class="lead">Create a gallery and start uploading photos.</p>
      </div>
    </article>
  </div>


  <article class="grid-container">
    <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
      <?php foreach ($galleries as $gallery) : ?>
      <div class="cell">
          <a href="/gallery/show/{{$gallery->id}}">
        <img class="thumbnail" src="/image/{{ $gallery->cover_image }}">
      </a>
        <h5>{{ $gallery->name }}</h5>
        <p>{{  $gallery->description }}</p>

        <!--<form action="/gallery/{{$gallery->id}}" class="pull-xs-right5 card-link" method="POST" style="display: inline;">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input class="alert button small" type="submit" value="Delete">
          
        </form>-->
      </div>

    <?php  endforeach; ?>
    </div>
</article>
@stop