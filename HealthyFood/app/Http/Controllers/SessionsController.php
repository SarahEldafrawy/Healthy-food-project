<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class SessionsController extends Controller
{	
	public function __construct()
	{
		$this->middleware('guest',['except' => 'destroy']);
	}
	public function create()
	{

		return view('sessions.create');
	}


	 public function store()
    {
       $rules = [
            'email'=>'required',
            'password' => 'required'
        ];

        $input = Input::only( 'email', 'password');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

        
     //  dd(Auth::attempt($credentials));
     

       if ( ! Auth::attempt($credentials))
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'credentials' => 'We were unable to sign you in.'
                ]);
        }

        return redirect('/timeline');
    }


	/*public function store(){
		if(! \Auth::attempt(request(['email', 'password']))){

			return back()->withErrors([

				'message'=>'please check your entries'
				]);
		}
		
		return redirect('/');
	}
*/
	public function destroy()
	{
		auth()->logout();

		return redirect('/');
	}
	public function homePage()
	{
		

		return view('users.timeline');
	}

}
