<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class LibraryController extends Controller
{
	public function showIndex(){
		$data['title']    = 'Main Library';
		$data['navTitle'] = 'Main Library';
		return view('library.index', $data);
	}
}
