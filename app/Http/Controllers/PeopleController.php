<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Profile;
use App\Carousel;

use Auth;
use Validate;
use Schema;
use Image;

class PeopleController extends Controller
{
	function __construct(){
		$data = array();
	}

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

	public function create(Request $request, $user_id){
		$this->validate($request,[
			'name' => 'required|',
			'email' => 'required',			
			'avatar_filename' => '',
			'nick' => 'required|unique:users|max:16',
			'status' => '',
			'available' => ''
		]); 

		$user = User::create(array_filter($request->all()));

		if($request->hasFile('user_avatar')){		
			$avatar = $request->file('user_avatar');
			$extension = $avatar->getClientOriginalExtension();
			$filename = md5($avatar).".".$extension;

			Image::make($avatar)->resize(50 ,50 )->save(public_path('img/avatars/'.$filename.'_thumb'));
			Image::make($avatar)->resize(150,150)->save(public_path('img/avatars/'.$filename.'_small'));
			Image::make($avatar)->resize(400,400)->save(public_path('img/avatars/'.$filename.'_medium'));

			$avatar->move('img/avatars/',$filename);
			$user->avatar_filename = $filename;
		}

		if($user->save()){
			return back()->with('status','Welcome to Mumble, '.$user->name);
		}else{
			return back()->with('error','Something went wrong.');
		}
	}

	public function update(Request $request, $user_id){

		// TODO: I still need to incorporate a javascript check to make sure that
		// if either email field is filled out, make sure they match

		if($request->has('email')){
			if($request->input('email')!==$request->input('2-email')){
				return back()->with('error',"Emails didn't match!");
			}
		}

		$this->validate($request,[
			'email'       => 'unique:users|email',
			'nick'        => 'unique:users|max:16',
			'user_avatar' => 'file|image'
		]); 

		$user = User::find($user_id);

		if($request->hasFile('user_avatar')){		
			$avatar = $request->file('user_avatar');
			$extension = $avatar->getClientOriginalExtension();
			$filename = md5($avatar).".".$extension;

			Image::make($avatar)->resize(50 ,50 )->save(public_path('img/avatars/'.$filename.'_thumb'));
			Image::make($avatar)->resize(150,150)->save(public_path('img/avatars/'.$filename.'_small'));
			Image::make($avatar)->resize(400,400)->save(public_path('img/avatars/'.$filename.'_medium'));

			$avatar->move('img/avatars/',$filename);
			$user->avatar_filename = $filename;
		}

		$user->update(array_filter($request->all()));

		if($user->save()){
			return back()->with('status','User information has been updated!');
		}else{
			return back()->with('error','Something went wrong.');
		}
	}

	public function updateCarousel(Request $request, $user_id){

		$user = User::find($user_id);
		$user->update($request->all());

		/*
			for each of the images added to the carousel, use intervention
				original size
				profile/forum (large) 900(Max) x height
				index (gaussian blurred) 900 x 300
		*/
	}
}