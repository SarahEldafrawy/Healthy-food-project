@extends('layouts.master')

@section('content')

   <div class="col-sm-8 blog-main" >

          <h1>Create a post</h1>

<br>
<form action="/tags" method="POST">
          {{ csrf_field()}}
<div class="row">
<div class="col-sm-4" style="margin-top: 3px;">
  <input type="name" class="form-control" name="name" placeholder="Others" style="width: 190px; margin-right: 10px; border-radius:5px;">
            </div>
  <button type="submit" class="btn btn-primary" style="background-color: transparent; color:black; border-color:#908981; margin-top: 3px;">Add New Tag</button>
</div>
</form>
          <form method="POST" action="/posts">
          {{ csrf_field() }}
           {{ Form::label('tags','Tags:') }}


  <select class="form-control select2-multi" multiple="multiple" name="tags[]">
          @foreach($tags as $tag)
  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
  @endforeach
</select>


<br>
        <div class="form-group">
           <label for="title">Title:</label>
            <input type="title" class="form-control" id="title" name="title" a>
        </div>

        <div class="form-group">
           <label for="numberofcalories">NumberOfCalories:</label>
            <input type="numberofcalories" class="form-control" id="numberofcalories" name="numberofcalories">
        </div>

        <div class="form-group">
           <label for="ingredients">ingredients:</label>
            <input type="ingredients" class="form-control" id="ingredients" name="ingredients">
        </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Body:</label>
           <textarea id="body" name="body" class="form-control"></textarea>

           </div>
           
         <div class="form-group">   
       <button type="submit" class="btn btn-primary" style="background-color: transparent; color:black; border-color:#908981;">Publish</button>
       </div>

    </form>
    @include('layouts.errors')
     </div>

@endsection
@section('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

{!! Html::script('js/select2.js') !!}
<script type="text/javascript">
$('.select2-multi').select2();
</script>

@endsection