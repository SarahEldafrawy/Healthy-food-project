<!DOCTYTPE html>
<header>

<title> Home </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>

<style type="text/css">
body {
	  background-image: url('blueberry.jpg' );

}

.container-fluid{
	padding-left:0px;
	padding-right:0px;
	padding-bottom: 80px;
	padding-top:0px;
	text-align:center;
}
.jumbotron{
	background-color:transparent;
	color:white;
	padding-bottom:80px;
}
.btn {
  margin-right:5px;
  margin-left:5px;
  background-color:transparent;
  border-color:white;
}
.carousel {
	margin-top: 200 px;
	margin-bottom: 30 px;
	padding-bottom: 20px;	
	padding-top: 20px;
	background-color: rgba(211,211,211,0.6);
}
.carousel-inner {
	max-height:250px;
	text-overflow: ellipsis;
}
</style>

<body>

<div class="container-fluid">

	<div class="jumbotron">
		<h1>Health Kitchen</h1>      
		<p>The Greatest Wealth is Health</p>
    <form action="/login" method="GET">
    <button type="submit" class="btn btn-primary" >Sign in</button>
    </form>
    <form action="/register" method="GET">
<button type="submit" class="btn btn-primary">Sign up</button>
</form>
	</div>	

<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active" class="row" style="padding-right:2%; padding-bottom:2%; padding-left:2%;">
   <?php
           use App\Post;
                      use App\User;


                     $count=0;
                        $array = array();
                        $posts = Post::all();
         ?>
@if($posts->count() >0)
<?php
          do{
           $int = rand(0,$posts->count());
         
            $post= $posts->find($int);
            if($post != null /**&& !in_array($int, $array)*/){
            array_push($array, $int);
            $count = $count +1 ;
            $user = User::find($post->user_id);

          ?>
          	<div class="col-md-4">
<div class="col-md-6">
            <div class="imgAbt">
                <img class="img-thumbnail" class="img-responsive" alt="Cinque Terre" width="224" height="224" src="/uploads/avatars/{{ $user->avatar }}" />
            </div>
            </div>
            
             <div class="col-md-6" style="text-align:left; size:200px; text-overflow: ellipsis; overflow: hidden;">
             <h1 style="margin:0;">{{$user->name}}</h1>

            <p>   @if(strlen($post->body) > 150)
            {{ str_limit($post->body, $limit = 150, $end =' ....') }}
            @if(Auth::check())
            <a href="/posts/{{ $post->id }}">See More</a>
            @else
             <a href="/login">See More</a>
             @endif
             @else
            {{ $post->body }}
            @endif</p>
    
             <?php
           }
         }while($count<9)
?>
@endif
</div>
</div>
	
	
  </div>
</div>	
	
	
</div>

</body>

</html>