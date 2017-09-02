<?php 
use App\Tag;

?>

{!! Html::style('css/select2.css') !!}

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>{{ $user->name }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">

   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
@include('layouts.nav')

<style type="text/css">
 body{
    background-image:  url('/uploads/cinnamon2.jpg');
  }
</style>
<body>

  
  
  
<div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-3 well" style="background-color: #d9b38c;">
      <div class="well" style="background-color:  #e6ccb3;">
        <p><a href="#">{{ $user->name }}</a></p>
        <img src="/uploads/avatars/{{ $user->avatar }}"  class="img-circle" height="150" width="150" alt="Avatar">
        <br>
        @if(!$user->statue == 'user')
        <span class="label label-success">{{$user->statue}}</span>
        @else
                <span class="label label-primary">{{$user->statue}}</span>
@endif
      </div>
      <div class="alert alert-success fade in" style="background-color:  #e6ccb3;">
        <p>
        <a href="/followers/{{ $user->id }}">
             <button type="submit" class="btn btn-primary">Followers</button>
        </a>
        <a href="/following/{{ $user->id }}">
             <button type="submit" class="btn btn-primary">Following</button>
        </a>
          
        </p>
      </div>
      <div class="alert alert-success fade in" style="background-color:  #e6ccb3;">
         
    @if(! auth()->user()->followers()->find($user->id))
    <form method="POST" action="/follow/{{ $user->id }}">
    {{ csrf_field()}}
       <a href="#">
             <button type="submit" class="btn btn-primary">follow</button>
        </a>

    </form>
    @else
     <form method="POST" action="/unfollow/{{ $user->id }}">
    {{ csrf_field()}}
       <a href="#">
             <button type="submit" class="btn btn-primary">unfollow</button>
        </a>

    </form>
    @endif
    </div>
      
    {{$user->aboutme}}
  @if(auth()->user()->id == $user->id)
  <form action="/users/edit" method="get">
              <button class="btn btn-primary" style="background-color: #EDEDED; color:black; border-color:#908981; margin-top: 3px;">
              Edit
              </button>
              </form>
      @endif
    </div>
   @foreach($user->posts()->latest()->get()  as $post)
    <div class="col-sm-7">
      
      <div class="row">
        <div class="col-sm-9">

          <div class="well">
           
 <h2>
  <a href="/posts/{{ $post->id }}">
            {{ $post->title }}

             </a>
            </h2>
            <div class="tags">
  @foreach ($post->gettags as $tag)
    <span class="label label-default">{{ $tag->name }}</span>
  @endforeach
</div>

            <p class="blog-post-meta">
            {{ $post->user->name }} on
            {{ $post->created_at->toFormattedDateString() }}
            </p>
            <p><strong>ingredients: &nbsp </strong>
            {{ $post->ingredients }}
            </p>
            <p><strong>calories: &nbsp </strong>
            {{ $post->numberofcalories }}
            </p>

             @if(strlen($post->body) > 150)
            {{ str_limit($post->body, $limit = 150, $end =' ....') }}
            <a href="/posts/{{ $post->id }}">See More</a>
            @else
            {{ $post->body }}
            @endif
           
  
          </div>
        </div>
      </div>
  </div>
  @endforeach  
   
</div>
</div>

         


</body>
</html>