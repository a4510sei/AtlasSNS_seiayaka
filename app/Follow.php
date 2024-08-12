<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //指定カラムのみ更新可能にする。
        protected $fillable = [
        'following_id', 'followed_id' ,
    ];

    /* 関連付け Follow→User（n:1）*/
    public function user(){
        return $this->belongsTo('App\User');
    }
    /* 関連付け Follow→Post（n:n）*/
    public function post(){
        return $this->hasMany('App\Post');
    }

}
