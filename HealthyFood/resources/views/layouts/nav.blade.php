 <style type="text/css">
   .blog-masthead{
    font-size: 17px;
   
   }
 </style>
 <div class="blog-masthead" style="background-color: transparent; font-color: #333;">
      <div class="container-fluid">
        <nav class="nav blog-nav">
          <div class="navbar-header">
          
           <img src=""> <a class="nav navbar-brand blog-nav-item" href="#">Healthy Food </a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
              @if(!Auth::check())
                <li><a class="blog-nav-item active" href="/">Home</a></li>
                @else
                 <li><a class="blog-nav-item active" href="/timeline">Home</a></li>
                  @endif
                   @if(Auth::guest())
               <li><a class="blog-nav-item" href="/register">sign-up</a></li>
               <li><a class="blog-nav-item" href="/login">log-in</a></li> 
               @endif
                  @if(Auth::check())
                <li><a class="blog-nav-item" href="/posts/create">New Post 
                <span style="font-size:small;" class="glyphicon glyphicon-plus"></span></a></li>
                <form class="navbar-form navbar-right" id="tfnewsearch"
                 method="POST" action="/search">
                {{ csrf_field() }}
              
               <div class="form-group input-group">

                  <input type="text" class="form-control" placeholder="Search.." id="search" name="search">
                  <span class="input-group-btn">
                    <div class="form-group">   
                   <button type="submit" class="btn btn-primary" style="background-color: transparent; color:#908981; border:none;"><span class="glyphicon glyphicon-search"></span></button>
                 </div>
                     <span class="glyphicon glyphicon-search"></span>
                   </button>
                  </span>        
                </div>
              </form>
                @endif

              </ul>
              @if(Auth::check())
              <div class="dropdown nav navbar-nav navbar-right blog-nav-item">
                  <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="padding:0px; margin: 0px; background-color: transparent;">
          <div class="blog-nav-item navbar-right" style="margin:0px;">
          <img src="/uploads/avatars/{{ auth()->user()->avatar }}"
           style="width: 22px; height: 22px; margin-right:5px; border-radius: 50%;">
           {{ Auth::user()->name }}
          </div>
           </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li><a class="blog-nav-item" href="/profile"> My Account</a>
                </li>
                <li><a class="blog-nav-item" href="/timeline">Timeline</a></li>
                <li><a class="blog-nav-item" href="/logout">Logout</a></li>
              </ul>
              </div>
               @endif
            </div>
<!--  fadel login w sign up -->
          <!-- <a class="blog-nav-item active" href="/">Home</a>
          <a class="blog-nav-item" href="/login">log-in</a> 
          <a class="blog-nav-item" href="/posts/create">New Post</a>
          <a class="blog-nav-item" href="/register">sign-up</a>
          <a class="blog-nav-item" href="/">timeline</a>
          <a class="blog-nav-item" href="/logout">logout</a>
          <a class="blog-nav-item" href="/search">search</a> -->
        </nav>
      </div>
    </div>
