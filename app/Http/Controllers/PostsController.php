<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index',['posts'=>$posts]);
    }
}
