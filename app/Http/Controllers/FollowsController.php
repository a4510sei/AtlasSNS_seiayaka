<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //フォローリストの表示
    public function followList(){
        return view('follows.followList');
    }
    //フォロワーリストの表示
    public function followerList(){
        return view('follows.followerList');
    }

}
