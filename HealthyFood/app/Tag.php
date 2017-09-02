<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function getposts()
	{

		return $this->belongsToMany(Post::class);
		
	}
	public function getRouteKeyName(){
		return 'name';
	}
}
