<?php

namespace App;



class Post extends Model
{
 

	public function comments()
	{
		return $this->hasmany(Comment::class);
	}

	public function user()
   {
   	return $this->BelongsTo(User::class);
   }

	public function addComment($body)
	{	
		
		$this->comments()->create([

			'body'=>$body,
			'user_id'=>auth()->id()
			]);
	
	}
	public function gettags() {
		return $this->BelongsToMany('App\Tag');
	}
	public function likes()
 {
		return $this->BelongsToMany('App\User','likes');
  }

  }
