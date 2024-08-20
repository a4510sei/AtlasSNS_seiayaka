<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //指定カラムのみ更新可能にする。
        protected $fillable = [
        'user_id', 'post' ,
    ];

    /* 関連付け Post→User（n:n ）*/
    public function user(){
        return $this->belongsTo('App\User');
    }
    /* 関連付け Post→Follow（n:n ）*/
    public function follow(){
        return $this->belongsToMany('App\Follow',);
    }

}
