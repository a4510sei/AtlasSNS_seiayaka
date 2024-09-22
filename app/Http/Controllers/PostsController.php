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
    // ①現在認証しているユーザーのIDを取得
    $user_id = Auth::id();
    // ②フォロー対象のidを取得し、配列にする。
    $followed_ids = FOLLOW::where('following_id',$user_id)->pluck('followed_id')->toArray();
    // ③ user_idが②（フォロー対象）に含まれる、または①（ユーザーID）と合致するpostを取得、
    $posts = Post::whereIn('user_id',$followed_ids)
                 ->orWhere('user_id',$user_id)
    // postに紐づいたuserの情報を取得
                 ->with('user')
    // 更新日時が新しい順
                 ->latest()
                 ->get();
      return view('posts.index',['posts'=>$posts,'user_id'=>$user_id,'followed_ids'=>$followed_ids]);
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
// ポスト編集実処理
    public function postUpdate(Request $request)
    {
        // Postテーブルを入力した内容でUpdate
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // 2つ目の処理
        Post::where('id', $id)->update([
              'post' => $up_post,
        ]);
        // 3つ目の処理
        return redirect('/top');
    }
// ポスト削除
    public function postDelete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
  }
