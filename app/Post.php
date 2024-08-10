<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //指定カラムのみ更新可能にする。
        protected $fillable = [
        'user_id', 'post' ,
    ];

    /* 関連付け Post→User（ｎ：１ ）*/
    public function user(){
        return $this->belongsTo('App\User');
    }

}
