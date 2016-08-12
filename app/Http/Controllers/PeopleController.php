<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Profile;
use App\Carousel;

use Auth;
use Validate;

class PeopleController extends Controller
{
	public function showIndex(){
		$data['users'] = User::with('tags')->get();	
		$data['title'] = 'People Index';
		$data['navTitle'] = 'People Index';

		return view('people.index', $data);
	}

	public function showProfile($user_nick){
		$data['user']     = User::with('tags','profile')->where('nick',$user_nick)->first();
		$data['carousel'] = Carousel::with('photos')->where('profile_id',$data['user']->profile->id)->first();   
		$data['title']    = $data['user']->name;
		$data['navTitle'] = $data['user']->name;
		return view('people.profile', $data);     
	}

	public function update(Request $request, $user_id){
		$this->validate($request,[
			'email'=>'email',
		]); 

		$user = User::find($user_id);
		if($request->has('name')){
			$user->name  = $request->input('name');
		}
		if($request->has('nick')){
			$user->nick  = $request->input('nick');
		}
		if($request->has('email')){
			$user->email = $request->input('email');
		}
		
		if($user->save()){
			return redirect()->intended('/')->with('status','User information has been updated!');
		}else{
			return redirect()->intended('/')->with('error','Something went wrong.');
		}
	}
}