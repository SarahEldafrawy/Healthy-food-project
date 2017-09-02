@extends('layouts.master')



@section('content')


<div class="col-md-8">
<h1>Tags</h1>
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>
<form action="" method="GET">


<label for="id_label_single" style="width: 190px; margin-right: 10px; border-radius:5px;">
Search Tags
<br>
<select class="js-example-basic-single js-states form-control" name="tag" id="id_label_single">
  

  	@foreach ($tags as  $tag)
	
		<option value="{{ $tag->id }}">{{ $tag->name }}
		</option>
	
	@endforeach
  </select>
  
</label>
<button type="submit" name="submit" class="btn btn-primary" style="background-color: transparent; color:black; border-color:#908981; margin-top: 3px;">Show</button>
</form>
<?php
use App\Tag;
if(isset($_GET['submit'])){
$selected_val = $_GET['tag']; 
return view('tags.show')->withTag(Tag::find($selected_val));
echo "You have selected :" .$selected_val;  // Displaying Selected Value
}
?>
<form action="/tags" method="POST">
          {{ csrf_field()}}
<div class="row">
<div class="col-sm-4" style="margin-top: 3px;">
  <input type="name" class="form-control" name="name" placeholder="New tag" style="width: 190px; margin-right: 10px; border-radius:5px;">
            </div>
  <button type="submit" class="btn btn-primary" style="background-color: transparent; color:black; border-color:#908981; margin-top: 3px;">Add</button>
</div>
</form>

<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
</tr>
<tbody>
	@foreach ($tags as  $tag)
	<tr>
		<th>{{ $tag->id }}</th>
		<th> <a href="/tags/{{ $tag->id }}">{{ $tag->name }}
		</a></th>
	</tr>
	@endforeach
</tbody>

		</tr>

	</thead>


</table>
	

</div>





@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

{!! Html::script('js/select2.js') !!}
