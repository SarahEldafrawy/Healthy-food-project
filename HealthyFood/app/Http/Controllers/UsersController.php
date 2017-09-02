<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use App\Post;
use Image;
class UsersController extends Controller
{ 
  public function __construct()
   {
         $this->middleware('auth')->except('create');
   }
    public function create()
    {
    	$user=auth()->user();
    	return view('users.authprofile',compact('user'));
    }

    public function show(User $user)
   	{
         
   		return view('users.profile',compact('user'));
   	}
   	  public function createTimeline()
   	{
        $followees = Follower::where('follower_ID','=',auth()->user()->id)->get(['user_ID']);
         
   		return view('users.timeline')->withfollowees($followees);
   	}
    public function update_avatar(Request $request)
    {
         if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' .$avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300,300)->save(
            public_path('/uploads/avatars/'.$filename)
            );
         }
         $user=auth()->user();
         $user->avatar=$filename;
         $user->save();
        return view('users.authprofile',compact('user'));    }

        public function edit(){
           return view('users.edit');
        }
        public function update(Request $request,$id){
          $user = User::find($id);
          $user->aboutme = $request->input('aboutme');
          $user->save();
          return back();
        }
}
