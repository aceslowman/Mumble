<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class HomeController extends Controller
{
	public function showWelcome(){
		$data['title']     = "Mumble";
		$data['navTitle']  = "Mumble";

		$user = Auth::user();
		$data['user'] = $user;
		
		return view('home.welcome',$data);
	}

   public function login(){
		$data['title']     = "Mumble";
		$data['navTitle']  = "Mumble";   		

   		return view('home.login',$data);
   }
}
