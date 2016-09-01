<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Tag;
use Log;

class SearchController extends Controller
{
	public function search($profile_type){
		$result = User::with('tags')->where('name','LIKE','%'.$_POST['search_data'].'%')->get();
		Log::info($result);
		return $result;
	}

	public function sort($profile_type){
		switch($_POST['sort_type']){
			case 'alpha-az': 
				$result = User::with('tags')->orderBy('name','asc')->get();
				break;
			case 'tags-az':
				//This will need some different logic. I'll need to return a list of tags, and
				// then order alphabetically within them.
				$tags   = Tag::orderBy('name','asc')->all();//limit the number of tags per page
				$result = User::with('tags')->orderBy('name','asc')->get();
				break;
			case 'available-az':
				$result = User::with('tags')->orderBy('available','desc')->get();
				break;
			default:
				$result = 'undefined';
		}

		return $result;
	}
}
