@extends('layouts.master')



@section('content')
<div class="row">
<div class="col-md-8"> 
 <h1>{{ $tag->name }} Tag <small>{{ $tag->getposts()->count() }} Posts</small></h1>
 </div>
 <div class="col-md-4">
 <a href={{ route('tags.edit',$tag->id) }} class="btn btn-primary pull-right" style="margin-left:25px;">Edit</a>
  {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])}}
{{ Form::submit('Delete',['class'=>'btn btn-danger pull-right']) }}
{{ Form::close() }}
 	
 </div>
 </div>
 <div class="row">
 <div class="col-md-8">
 <table class="table">
 	<thead>
 		
 		<tr>
 			<th>#</th>
 			<th>Title</th>
 			<th>Tags</th>
 			<th></th>
 		</tr>
 	</thead>
 	<tbody>
 		@foreach($tag->getposts as $post)
 		<tr>
 			<th>{{ $post->id }}</th>
 			<td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
</td>
 			<td>@foreach($post->gettags as $tag)
                  <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
 			</td>
 		</tr>
 		@endforeach

 	</tbody>

 </table>
 	

 </div>
 	

 </div>
 @endsection