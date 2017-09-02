@extends('layouts.master')
@section('content')
{{ Form::model($tag ,['route'=>['tags.update', $tag->id],'method'=>'PUT'])}}
<div class="col-md-1" style="color: transparent;">
{{ Form::label('name')}}
</div>
<div class="col-md-4">
{{Form::text('name',null , ['class'=>'form-control'])}}
</div>
<div>
{{ Form::submit('Save Changes',['class'=>'btn btn-success'])}}
</div>
{{ Form::close()}}
@endsection