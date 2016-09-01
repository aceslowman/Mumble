<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ProjectController extends Controller
{
	public function showIndex(){
		$data['title'] = 'Project Index';
		$data['navTitle'] = 'Project Index';
		return view('index.index', $data);
	}

	public function showProfile($project){
		$data['title'] = 'ProjectName';
		$data['navTitle'] = 'ProjectName';
		return view('profile.profile', $data);
	}
}
