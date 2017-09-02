<?php 
use App\Tag;

?>
<!--   <div class="col-md-3 blog-sidebar pull-right">
 -->          <div class="sidebar-module sidebar-module-inset">
            <h4>About me</h4>
            @if(Auth::check())
            <p>
              {{ auth()->user()->aboutme }}
              <form action="/users/edit" method="get">
              <button class="btn btn-primary" style="background-color: #EDEDED; color:black; border-color:#908981; margin-top: 3px;">
              Edit
              </button>
              </form>
            </p>
            @else 
            <p>
              Healthy food gives you the chance to have a life which is healthy , long and full of energy.
            </p>
                        @endif

          </div>
        <!--   <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div> -->
          <div class="sidebar-module">
          <h3>Tags</h3>
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
         }while($count<3)

            ?>
          <a href="/tags">see more</a>
<!--           </div>
 -->          
        </div><!-- /.blog-sidebar -->