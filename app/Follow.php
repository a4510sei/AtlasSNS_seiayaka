<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    public function myFollowingCounts(){
      // WHEREでpostsテーブルのuser_idカラムとログインしているユーザーのidが一致している投稿を取得
      $following = Post::where('user_id', Auth::id())->get();
      return view('layouts.login', compact('following'));
    }
}
