@extends('layouts.master')

@section('content')

{!! Html::style('css/select2.css') !!}

   <div class="col-sm-8 blog-main">
  
{!! Form::model($post,['route'=>['posts.update',$post],'method'=>'PUT'])!!}
Title:
{{Form::text('title', null,["class"=>'form-control'])}}   
      Body:

          {{ Form::textarea('body',null,["class"=>'form-control']) }}
          Number of Calories :
          {{ Form::text('numberofcalories',null,["class"=>'form-control'])}}
          Ingredients :
                    {{ Form::text('ingredients',null,["class"=>'form-control'])}}

         
{{ Form::label('tags','Tags:') }}

  <select class="form-control select2-multi" multiple="multiple" name="tags[]">
  <?php $terms = array();?>
            @foreach($post->gettags as $tag)
             {!! array_push($terms, $tag->id) !!}
            @endforeach

          @foreach($tags as $tag)
         @if(in_array($tag->id, $terms))

  <option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
@else
  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
@endif
 
@endforeach
</select>
          <div style="margin-top:15px;">
{{ Form::submit('Save changes',['class'=>'btn btn-success']) }}
{!! Html::linkRoute('posts.show','Cancel',array($post),array('class'=>'btn btn-danger')) !!}

</div>
          <hr>

          <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit post</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
         <div class="comments">
          <ul class="list-group">
           @foreach($post->comments as $comment)
              <li class="list-group-item">
                
              <strong>
              {{ $comment->user->name }}: &nbsp
              </strong>
              {{ $comment->body }}
              <div class="lowercase pull-right" style="font-size:10pt; color:grey;">{{ $comment->created_at->diffForHumans()}}</div>

              </li>
              @endforeach
          </ul>
{!! form::close() !!}
         </div>
               <hr>

               <div class="card">
                  <div class="card-block">
                  
                     
                     <form method="POST" action="/posts/{{ $post->id }}/comments">
                      {{ csrf_field() }}
                                 <div class="form-group">
                           <textarea name="body" placeholder="Your comment here." 
                           class="form-control" require></textarea>
                        </div>
                        <div class="form-group">   
                                <button type="submit" class="btn btn-primary">Add Comment</button>
                         </div>

                     </form>

                     @include('layouts.errors')
                  </div>

               </div>
           </div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

{!! Html::script('js/select2.js') !!}
<script type="text/javascript">
$('.select2-multi').select2();
</script>
@endsection