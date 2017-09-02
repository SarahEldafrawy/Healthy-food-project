<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    public function getposts()
	{

		return $this->belongsToMany(Post::class);
		
	}
}
