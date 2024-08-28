<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    // ユーザー検索画面の表示
        public function search()
    {
        return view('users.search'); // 検索フォームのビューを返す
    }
    // ユーザー検索結果
    public function searchResult(Request $request)
    {
        $keyword = $request->input('keyword');
        $id = Auth::id();
        // ユーザー名にキーワードが含まれる、かつ、自分以外のユーザーを取得
        if(!empty($keyword)){
             $users = User::where('username','like', '%'.$keyword.'%')
                          ->Where('id','<>',$id)
                          ->get();
        }else{
            // 検索欄が空欄の場合、すべてを表示
             $users = User::all();
        }
        // 検索結果画面を表示（引数：自分のid、対象ユーザー列、検索キーワード、フォローユーザー列）
        return view('users.search_result',['id'=>$id,'users'=>$users,'keyword'=>$keyword,]);
    }


}
