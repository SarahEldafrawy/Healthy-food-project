<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','statue',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
   {
   	return $this->hasMany(Post::class);
   }
    public function comments()
   {
    return $this->hasMany(Comment::class);
   }
  public function followers()
   {
      return $this->belongsToMany('App\User', 'followers', 'follower_ID', 'user_ID');
    }
    public function followees()
   {
      return $this->belongsToMany('App\User', 'followers',  'user_ID','follower_ID');
    }

    public function follow(User $user) {
    $this->followers()->attach($user->id);
    }
   
    public function unfollow(User $user) {
       $this->followers()->detach($user->id);
      }
   public function publish(Post $post)
   {
        $this->posts()->save($post);
   }
   public function likes(){

      return $this->belongsToMany('App\Post','likes','user_id','post_id');
    }
   
public function like(Post $post){
$this->likes()->attach($post->id);
}
 
}
