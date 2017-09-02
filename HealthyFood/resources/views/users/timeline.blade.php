
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Newsfeed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  .container-fluid{
  padding-left:40px;
  padding-right:40px;
  margin-right: auto;
  margin-left: auto;
  }
  body{
    background-image:  url('/uploads/cinnamon2.jpg');
  }
  </style>
</head>
<body>

@include('layouts.nav');
  
<div class="container-fluid text-center" >    
  <div class="row">
    <div class="col-sm-3 well" style="background-color: #d9b38c;">
      <div class="well" style="background-color:  #e6ccb3;">
        <p><a href="/profile">My Profile</a></p>
       <img src="/uploads/avatars/{{ auth()->user()->avatar }}"  class="img-circle" height="150" width="150" alt="Avatar">
      </div>
      <div class="well" style="background-color:  #e6ccb3;">
        <p><a href="/tags">Tags</a></p>
        <?php
        use App\Tag;

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
             <a href="/tags/{{$tag1->id}}"><span class="label label-default btn-primary">{{$tag1->name}}</span> </a>
             <?php
           }
         }while($count<3)

            ?>
            <br>
          <a href="/tags">see more</a>
          </div>
          
        
      
      <div class="well" style="background-color:  #e6ccb3;">
      About Me :
              <p>{{auth()->user()->aboutme}}</p>
{{--               @if(auth()->user()->id)
 --}}      </div>

    </div>
  
    <div class="col-sm-7">
      
       <?php
use App\User;
?>
@if($followees->count() == 0)
<h2>No Posts to show </h2> 
@else
@foreach($followees as $followee)
<?php

$followee = User::find($followee->user_ID);
?>
@foreach($followee->posts()->latest()->get()  as $post)
          
       <div class="row">

<div class="col-sm-3">
 @if($followee->statue == 'user')
        <div class="well" style="background-color:  #e6faff;">
        @else
                <div class="well" style="background-color: #ccffdd;">
@endif
           <p>{{$followee->name}}</p>
           <img src="/uploads/avatars/{{ $followee->avatar }}" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9 text-left">
          @if($followee->statue == 'user')
        <div class="well" style="background-color:  #e6faff;">
        @else
                <div class="well" style="background-color: #ccffdd;">
                @endif
 <p class="blog-post-meta">
          <a href="/profile/{{ $post->user->id }}">  {{ $post->user->name }}
          </a> on
            {{ $post->created_at->toFormattedDateString() }}
            </p>
            <p><strong>ingredients: &nbsp </strong>
            @if(strlen($post->ingredients) > 50)
            {{ str_limit($post->body, $limit = 50, $end =' ....') }}
            @else
            {{ $post->ingredients }}
            @endif            </p>
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
           
           
  @endforeach  
  
  @endforeach   
       
       @endif
       </div>
    <div class="col-md-2 well pull-right" style="background-color:  #e6ccb3;">
         
      <div class="well" style="background-color: #d9b38c;">
        <p>ADS</p>
      </div>
      <div class="well" style="background-color: #d9b38c;">
        <p>ADS</p>
      </div>
      <div class="well" style="background-color: #d9b38c;">
        <p>ADS</p>
      </div>
    </div>
  </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p class="pull-right">copyRights@</p>
</footer>



</div>
</body>
</html>