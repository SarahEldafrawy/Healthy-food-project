@extends('layouts.master')



@section('content')
  <div class="col-sm-8 blog-main">
  <div>
  	
  	<h1>Search Results</h1>
  	 @foreach ($users as $user)
     
     
    <div>
    @if($user == auth()->user())
    @else
     <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;"> 
     <h2>
     
  	<a href="/profile/{{ $user->id }}">
           
  		{{ $user->name }}
          

      </a>
      
      </h2>
      @endif
      </div>
      
      	@endforeach
  	
  </div>

  </div>


@endsection