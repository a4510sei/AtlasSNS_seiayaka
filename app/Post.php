<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /* 関連付け Post→User（ｎ：１ ）*/
    public function user(){
        return $this->belongsTo('App\User');
    }

}
