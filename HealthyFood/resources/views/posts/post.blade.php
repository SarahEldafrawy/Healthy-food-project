
          <div class="blog-post">
            <h2 class="blog-post-title">
            <a href="/posts/{{ $post->id }}">
            {{ $post->title }}
            </a>
            </h2>
             <div class="tags">
  @foreach ($post->gettags as $tag)
    <span class="label label-default">{{ $tag->name }}</span>
  @endforeach
</div>

             
          

            <p class="blog-post-meta">
            @if(auth()->user() == $post->user)
            <a href="/profile ">
                       {{ $post->user->name }}
            </a>
            @else
           <a href="/profile/{{ $post->user->id }}">
                       {{ $post->user->name }}
                       </a>
                       @endif
                        on
            {{ $post->created_at->toFormattedDateString() }}
            </p>
            <p><strong>ingredients: &nbsp </strong>
            {{ $post->ingredients }}
            </p>
            <p><strong>calories: &nbsp </strong>
            {{ $post->numberofcalories }}
            </p>

             @if(strlen($post->body) > 150)
            {{ str_limit($post->body, $limit = 150, $end =' ....') }}
            <a href="/posts/{{ $post->id }}">See More</a>
            @else
            {{ $post->body }}
            @endif
          </div><!-- /.blog-post -->