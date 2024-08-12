<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\Post;

//Illuminate\Http\Request;
class PostsController extends Controller
{
    //UserからPostを拾う
    public function index(){
    // ①UserからFollow->following_idに紐づくfollowed_idを取得
    // ①現在認証しているユーザーのIDを取得
    $id = Auth::id();
    // ②idがfollowed_idと一致するpostを取得
    // ::with 取得したPostのuser_idをまとめ、それらのUser情報を取得
    //  $posts = Post::with(['user' => function($query){*******}])->get();
    //条件を足す→下記コードをアレンジ
    // $users = App\User::with(['posts' => function ($query) {
    // $query->where('content', 'like', '%good%');
    // }])->get();
      return view('posts.index',['posts'=>$posts]);
    }

//    public function show(){
//  // Postモデル経由でpostsテーブルのレコードを取得
//      $posts = Post::get();
//      return view('yyyy', compact('posts'));
//    }

    public function postCounts(){
      $id = Auth::id();
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
