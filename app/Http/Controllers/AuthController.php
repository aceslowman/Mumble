<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Validate;
use Input;

class AuthController extends Controller
{
   protected $messageBag;

   public function login(Request $request){
		$this->validate($request,[
			'email'=>'required|email',
			'password'=>'required|alphaNum|min:3'
		]);
		
		if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$request->input('remember'))){
			return redirect()->route('welcome');
		}else{
			return redirect()->route('show_login')->with('error','Incorrect email or password.');
		}
	}

	public function logout(){
		Auth::logout();

		return redirect()->intended('welcome')->with('status','You have been succesfully logged out. You are a stranger.');
	}
}
