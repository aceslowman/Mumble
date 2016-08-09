<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function profile(){
        return $this->morphOne('App\Profile', 'profileable');
    }

    public function tags(){
    	return $this->morphtoMany('App\Tag', 'taggable');
    }
}
