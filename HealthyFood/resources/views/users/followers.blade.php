@extends('layouts.master')
@section('content')
<div class="col-sm-8 blog-main">
@foreach($followers as $follower)
<h2>
	@if(App\User::find($follower)==auth()->user())
	<img src="/uploads/avatars/{{ auth()->user()->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;"> 
	<a href="/profile">
	{{ auth()->user()->name }}
	</a>
	@else
	<img src="/uploads/avatars/{{ App\User::find($follower)->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;"> 
	<a href="/profile/{{ App\User::find($follower)->id }}">
	{{ App\User::find($follower)->name }}
	</a>
	@endif
	</h2>
@endforeach
</div>
@endsection