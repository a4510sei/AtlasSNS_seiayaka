<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

//Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //
    public function index(){
      $posts = Post::get();
      return view('posts.index',['posts'=>$posts]);
//        return view('posts（フォルダ）.index（Blade）',['posts'=>$posts]);
    }

//    public function show(){
//  // Postモデル経由でpostsテーブルのレコードを取得
//      $posts = Post::get();
//      return view('yyyy', compact('posts'));
//    }

    public function postCounts(){
      $posts = Post::get();
      return view('yyyy', compact('posts'));
    }
}
