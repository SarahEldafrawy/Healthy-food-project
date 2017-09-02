@extends('layouts.master')



@section('content')
<div class="col-sm-8 blog-main">
<div class="blog-nav-item">
             <form id="tfnewsearch" method="POST" action="/search">
             {{ csrf_field() }}
              <div class="form-group">
   				  <input type="search" class="form-control" id="search" name="search">
			  </div>

         <div class="form-group">   
 			 <button type="submit" class="btn btn-primary">search</button>
       			</div>
             </form>
      <div class="tfclear"></div>

 </div>
 </div>

@endsection