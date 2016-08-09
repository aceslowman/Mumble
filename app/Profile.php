<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	public function profileable(){
		return $this->morphTo();
	}

    public function carousel(){
    	return $this->hasOne('App\Carousel');
    }
}
