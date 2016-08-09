<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public $timestamps = false;

    public function users(){
    	return $this->morphedByMany('App\User', 'taggable');
    }

    public function projects(){
    	return $this->morphedByMany('App\Project', 'taggable');
    }
}
