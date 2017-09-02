@extends('layouts.master')
@section('content')
<div class="col-sm-8 blog-main">
@foreach($followees as $followee)
<h2>
	<img src="/uploads/avatars/{{ App\User::find($followee)->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;"> 
		<a href="/profile/{{ App\User::find($followee)->id }}">
	{{ App\User::find($followee)->name }}
	</a>
	
	</h2>

@endforeach
</div>
@endsection