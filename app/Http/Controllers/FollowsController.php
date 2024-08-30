<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\Post;

class FollowsController extends Controller
{
    //フォローリストの表示
    public function followList(){
    // ①現在認証しているユーザーのIDを取得
    $user_id = Auth::id();
    // フォローリスト用
    $follows = FOLLOW::where('following_id',$user_id)->get();
    //投稿一覧用
    // ②フォロー対象のidを取得し、配列にする。
    $followed_ids = FOLLOW::where('following_id',$user_id)->pluck('followed_id')->toArray();
    // ③ user_idが②（フォロー対象）に含まれるpostを取得、
    $posts = Post::whereIn('user_id',$followed_ids)
    // postに紐づいたuserの情報を取得
                 ->with('user')
    // 更新日時が新しい順
                 ->latest()
                 ->get();
        return view('follows.followList',['posts'=>$posts,'follows'=>$follows]);
    }
    //フォロワーリストの表示
    public function followerList(){
    // ①現在認証しているユーザーのIDを取得
    $user_id = Auth::id();
    // フォロワーリスト用
    $followers = FOLLOW::where('followed_id',$user_id)->get();
    //投稿一覧用
    // ②自分のフォロワーのidを取得し、配列にする。
    $followed_ids = FOLLOW::where('followed_id',$user_id)->pluck('following_id')->toArray();
    // ③ user_idが②（フォロー対象）に含まれるpostを取得、
    $posts = Post::whereIn('user_id',$followed_ids)
    // postに紐づいたuserの情報を取得
                 ->with('user')
    // 更新日時が新しい順
                 ->latest()
                 ->get();
        return view('follows.followerList',['posts'=>$posts,'followers'=>$followers]);
    }

}
