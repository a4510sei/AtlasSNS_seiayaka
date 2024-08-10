<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

//Illuminate\Http\Request;
class PostsController extends Controller
{
    //UserからPostを拾う
    public function index(){
      $posts = Post::with('user')->get();
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

    // post投稿
    // 設定内容：user_id,post
    // userからIDを拾って設定する
       public function postCreate(Request $request)
    {
        //認証済IDにてpostテーブルを更新
        $id = Auth::id();
        $post = $request->input('post');
        Post::create(['user_id' => $id,'post' => $post]);
        return back();
    }
}
