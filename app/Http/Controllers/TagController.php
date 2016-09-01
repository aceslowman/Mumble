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
    	$tag = Tag::create(['name'=>$_POST['tag_data']]);

    	$user = User::find($_POST['profile_id']);
    	$user->tags()->attach($tag->id);

    	return $tag;
    }

    public function detach(){
    	$user = User::find($_POST['profile_id']);
    	$user->tags()->detach($_POST['tag_id']);
    }
}