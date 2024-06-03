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

    public function show(){
  // Postモデル経由でpostsテーブルのレコードを取得
      $posts = Post::get();
      return view('yyyy', compact('posts'));
    }

    public function postCounts(){
      $posts = Post::get();
      return view('yyyy', compact('posts'));
    }
}
