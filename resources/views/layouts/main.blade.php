<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, intial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css" href="/css/foundation.css">
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas>
  <div class="grid-y grid-padding-x" style="height: 100%;">
    <br>
    <div class="cell auto">
      <h5>Main Menu</h5>
        <ul>
            <li><a href="/">Home</a></li>
            <?php if(!Auth::check()) : ?>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            <?php endif; ?>
            <?php if(Auth::check()) : ?>
            <li><a href="/gallery/create">Create Gallery</a></li> 
            <hr>
             <li> 
              <form action="/logout" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <input class="button" type="submit" value="Logout">
              </form> 
          </li>
             <?php endif; ?>
        </ul>
    </div>
  </div>
</div>

<div class="off-canvas-content" data-off-canvas-content>
  <div class="title-bar hide-for-large">
    <div class="title-bar-left">
      <button class="menu-icon" type="button" data-toggle="my-info"></button>
      <span class="title-bar-title">Mike Mikerson</span>
    </div>
  </div>

@if(Session::has('message'))
<div class="alert alert-info">
  {{Session::get('message')}}
</div>
@endif
  @yield('content')
    <hr>

  </article>
</div>


<script src="https://code/jquery.com/jquery-2.1.4.min.js"></script>
<script src="/js/foundation.js"></script>
<script src="/js/app.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>