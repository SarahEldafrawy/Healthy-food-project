@extends('layouts.master')
@section('content')

{{ Form::model(auth()->user(),['route'=>['users.update',auth()->user()->id],'method'=>'PUT'])}}
{{Form::text('aboutme', null,["class"=>'form-control'])}}   
{{Form::submit()}}
{{ Form::close()}}
@endsection