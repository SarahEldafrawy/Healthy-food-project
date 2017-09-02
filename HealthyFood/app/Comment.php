<?php

namespace App;



class Comment extends Model
{
    

   public function post()
   {
   	return $this->BelongsTo(Post::class);
   }

   public function user()
   {
   	return $this->BelongsTo(User::class);
   }
}
