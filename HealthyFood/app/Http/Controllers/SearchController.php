<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{     public function __construct()
   {
         $this->middleware('auth');
   }
    public function create(){
    	return view('users.search');
    }
    public function visit()
    {
    	$search = \Request::get('search');
    	$users = User::where('name','like','%'.$search.'%')->orderby('id')->paginate(3);
    	
        return view('sessions.results',compact('users'));
    	
    }
}
