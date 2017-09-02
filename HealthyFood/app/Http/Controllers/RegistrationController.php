<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
Use App\User;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Mail;

class RegistrationController extends Controller
{   
    public function __construct()
   {
         $this->middleware('guest');
   }
    
    public function create()
    {
        return view('registration.create');
    }

  /*   public function store()
    {

        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6|confirmed',
            'gender'=>'required',
            'statue'=>'required'
        ]);
        $user=User::create(request(['name','email','password','gender',
            'statue',
            ]));
        
        auth()->login($user);
        return redirect('/');
    }*/


public function store()
    {
        $rules = [
            'name' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender'=>'required',
            'statue'=>'required'
        ];
        $validator = Validator::make(Input::only('name', 'email', 'password', 'password_confirmation','gender','statue'), $rules);
        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $confirmation_code = str_random(30);
       
       $user= User::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'confirmation_code' => $confirmation_code,
            'gender'=>Input::get('gender'),
            'statue'=>Input::get('statue'),
            'aboutme'=>null,
        ]);
       
        Mail::send('emails.verify', compact('confirmation_code'), function($message) {
            $message->to(Input::get('email'), Input::get('name'))->subject('Verify your email address');
        });
      
        return redirect()->to('login')->with('success',"Thanks for signing up! Please check your email and follow the instructions to complete the sign up process");
    }

 public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
           return redirect('/')->with('warning',"Sorry, you didn't activate your code.");
        }
        $user = User::whereConfirmationCode($confirmation_code)->first();
        if ( ! $user)
        {
            return redirect('/')->with('warning',"Sorry, there is somthing wrong.");
        }
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
     //   Flash::message('You have successfully verified your account. You can now login.');
       
        return redirect()->to('login')->with('success',"You have successfully verified your account. You can now login.");
    }



}
