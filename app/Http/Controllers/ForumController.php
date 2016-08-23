<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Post;
use App\User;
class ForumController extends Controller
{
	public function showBulletin(){
		$data['posts'] = Post::with('user')->get();	

		$data['title']    = 'Bulletin';
		$data['navTitle'] = 'Bulletin';

		return view('forum.bulletin', $data);
	}

	public function create_post(){

	}

	public function update_post(){

	}

	public function delete_post(){
		
	}
}
