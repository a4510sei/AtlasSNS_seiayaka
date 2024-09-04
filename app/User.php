<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /* 関連付け User→Post（1：n）*/
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /* 関連付け User→Follow（1：n）*/
    public function follows(){
        return $this->hasMany('App\Follow');
    }
}
