<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\User;
use Log;

class TagController extends Controller
{
    public function attach(){
    	$user = User::find($_POST['profile_id']);
    	$user->tags()->attach($_POST['tag_id']);
    }

    public function detach(){
    	$user = User::find($_POST['profile_id']);
    	$user->tags()->detach($_POST['tag_id']);
    }
}

// [2016-08-28 10:15:43] production.INFO: array (
//   'profile_type' => 'user',
//   'profile_id' => '1',
//   'tag_id' => '1',
// )  
