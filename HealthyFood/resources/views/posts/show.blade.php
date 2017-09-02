@extends('layouts.master')

@section('content')

   <div class="col-sm-8 blog-main">

          <h1> {{ $post->title }}</h1>
           <div class="tags">
  @foreach ($post->gettags as $tag)
    <span class="label label-success">{{ $tag->name }}</span>
  @endforeach
</div>
          {{ $post->body }}

          <br>
          <br>
          <button type="button" class="btn btn-primary" style="background-color: transparent; color:black;" data-toggle="modal" data-target="#myModal1"> {{ $post->likes()->count()}} Likes </button>
          <hr>
          <div class="interaction row">
          <div class="col-md-2">

 @if(!auth()->user()->likes()->find($post->id))

                   <form action="/posts/{{$post->id}}/like" method="POST">
                                         {{ csrf_field() }}

                     <button type="submit" class="btn btn-primary" style="  border-color:#908981;">Like</button>
                   </form>
                   @else
           <form action="/posts/{{$post->id}}/dislike" method="POST">
                                         {{ csrf_field() }}

                     <button type="submit" class="btn btn-primary" style=" border-color:#908981;">UnLike</button>
                   </form>
                               @endif

            </div>
          @if(auth()->id() == $post->user_id)
          <div class="col-md-2">
            <a href="{{ url('/posts/' . $post->id . '/edit')}}"><button class="btn btn-default" style="background-color: transparent; color:black; border-color:#908981;">Edit</button></a>
          </div>
          <div class="col-md-2">

          {!! Form::open(array('route'=>['posts.destroy',$post->id],'method'=>'DELETE'))!!}
{!! Form::submit('Delete',['class'=>'btn btn-danger btn-primary']) !!}

{!! Form::close() !!}
 @endif
          </div>
          

          </div>
          <hr>
         
         <div class="comments">
          <ul class="list-group">
            @foreach($post->comments as $comment)
              <li class="list-group-item">
                
              <strong>
              {{ $comment->user->name }}
              {{ $comment->created_at->diffForHumans()}}: &nbsp

              </strong>

              {{ $comment->body }}

              </li>
                            <hr>

              @endforeach
          </ul>

         </div>
               <hr>

               <div class="card">
                  <div class="card-block">
                  
                     
                     <form method="POST" action="/posts/{{ $post->id }}/comments">
                      {{ csrf_field() }}
                                 <div class="form-group">
                           <textarea name="body" placeholder="Your comment here." 
                           class="form-control" require></textarea>
                        </div>
                        <div class="form-group">   
                                <button type="submit" class="btn btn-default" style="background-color: transparent; color:black; border-color:#908981;">Add Comment</button>
                         </div>

                     </form>

                     @include('layouts.errors')
                  </div>

               </div>
           </div>
  <div id="myModal1" class="modal fade" role="dialog" style="padding-top:10%;">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
<h2>Post's likes</h2>
  <p>People who liked this post</p>   
  </div>
      <div class="modal-body">
             
  <table class="table">
    <thead>
      <tr>
        <th>Num</th>
        <th>UserName</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
use App\User;
    ?>
       @foreach($post->likes()->get() as $user)

      <?php
      
      $count = $count +1;
      ?>
      <tr>
      <th>{{$count}}</th>
     <th><a href="/profile/{{$user->id}}">{{$user->name}}</a></th> 
      </tr>
      @endforeach
    </tbody>
  </table>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
@endsection