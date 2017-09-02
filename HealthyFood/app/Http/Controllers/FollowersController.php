<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Follower;

class FollowersController extends Controller
{
	 public function __construct()
   {
         $this->middleware('auth');
   }
     public function store(User $user)
   	{

   		 	auth()->user()->follow($user);
   		 	
   		 	
   		 
   		
   		return back();
   	}
   	public function delete(User $user)
   	{

   		 	auth()->user()->unfollow($user);
   		 	
   		 	
   		 
   		
   		return back();
   	}
         public function findFollowers(User $user)
      {

$followers = Follower::where('user_ID','=',$user->id)->get(['follower_ID']);
            
            
            
          
         
         return view('users.followers',compact('followers'));
      }
      public function findFollowing(User $user)
      {

   $followees = Follower::where('follower_ID','=',$user->id)->get(['user_ID']);
            
            
            
          
         
         return view('users.followee',compact('followees'));
      }
}
