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

    <title>{{ auth()->user()->name }}</title>

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
<style type="text/css">
  .btn-file {
    position: relative;
        overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
body{
    background-image:  url('/uploads/cinnamon2.jpg');
  }
</style>

<body>

@include('layouts.nav')
  
 <!--  <div id="myModal" class="modal fade" role="dialog" style="padding-top:10%;">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
    <form class="form-horizontal" style="text-align:left;">
      <div class="input-group" style="padding-top:2%;padding-bottom:2%;">
      <span class="input-group-addon">Title</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="Write the recipe name">
      </div>
      <div class="form-group" style="padding-right:4%;padding-left:4%;">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
      <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
      <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
      <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
        <button type="submit" class="btn btn-default" style="">Submit</button>
      </div>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div> -->
  
<div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-3 well" style="background-color:  #e6ccb3;">
      <div class="well" style="background-color: #d9b38c;">
        <p><a href="#">{{ $user->name }}</a></p>
        <img src="/uploads/avatars/{{ $user->avatar }}"  class="thumbnail center-block" height="250" width="250" alt="Avatar">
        @if($user->statue == 'user')
        <span class="label label-success">{{$user->statue}}</span>
        @else
                <span class="label label-primary">{{$user->statue}}</span>
@endif
      </div>
      <div class="well" style="background-color: #d9b38c;">
      <p>
      Update Profile picture
  <!--       <form enctype="multipart/form-data" method="POST" action="/profile">
  {{ csrf_field()}}
    <label>Update Profile Image</label>
    <br>
    <input type="file" placeholder="Browse" name="avatar" class="btn btn-primary btn-file" style="display:;">
    <button type="submit" class="btn btn-primary" style= "margin: 25px;" >Update</button>
    </form> -->
    <form enctype="multipart/form-data" method="POST" action="/profile">
      {{ csrf_field()}}
    <div class="fileinput fileinput-new" data-provides="fileinput">
    <span class="btn btn-primary btn-file"><span>Choose file</span><input type="file" name="avatar"/></span>
    <button type="submit" class="btn btn-primary" style= "margin-left: 10px;" >Update</button>
    </div>
    </form>
        </p>
      </div>
      <div>
      </p>
        <div class="well" style="background-color: #d9b38c;">
        <a href="/followers/{{ $user->id }}">
             <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Followers</button>
        </a>
        <a href="/following/{{ $user->id }}">
             <button type="submit" class="btn btn-primary">Following</button>
        </a>
          
        </div>
      </div>
      <div class="well" style="background-color: #d9b38c;">
        <a href="/posts/create">
             <button type="submit" class="btn btn-primary">New Post</button>
        </a>
      </div>
    </div>
   @foreach($user->posts()->latest()->get()  as $post)
    <div class="col-sm-7">
      
      <div class="row">
        <div class="col-sm-9">

          <div class="well text-left">
           
 <h2>
  <a href="/posts/{{ $post->id }}">
            {{ $post->title }}

             </a>
            </h2>
          

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
  <!-- <div class="row"> 
  <div class="col-sm-2 well">
  
       <div class="sidebar-module">
          <h4>Tags</h4>
         <?php
                     $count=0;
                        $array = array();
                        $tags = Tag::all();
         

          do{
           $int = rand(0,$tags->count());
         
            $tag1 = $tags->find($int);
            if($tag1 != null && !in_array($int, $array)){
            array_push($array, $int);
            $count = $count +1 ;
          ?>
             <li><a href="/tags/{{$tag1->id}}">{{ $tag1->name }} </a></li>
             <?php
           }
         }while($count<5)

            ?>
          <a href="/tags">see more</a>
          </div>
        
      </div> 

     </div>     -->
</div>
 </div>
         


</body>
</html>