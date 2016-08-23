<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar_filename','nick','status','available'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->morphOne('App\Profile', 'profileable');
    }

    public function tags(){
        return $this->morphtoMany('App\Tag', 'taggable');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
