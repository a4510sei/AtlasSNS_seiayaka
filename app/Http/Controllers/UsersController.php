<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Follow;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile($id){
        $user  = User::where('id',$id)->first();
        $posts = Post::where('user_id',$id)
                ->with('user')
    // 更新日時が新しい順
                ->latest()
                ->get();
        return view('users.profile',['user'=>$user,'posts'=>$posts]);
    }
    // ユーザー検索画面の表示
        public function search()
    {
        // 検索フォームのビューを返す
        return view('users.search');
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
        // 検索結果画面を表示（引数：自分のid、対象ユーザー列、検索キーワド、フォローユーザー列）
        return view('users.search_result',['id'=>$id,'users'=>$users,'keyword'=>$keyword,]);
    }

    public function profileUpdate(Request $request)
    {
        if($request->isMethod('post')){  //←POSTだったら
            // postの処理
            // Update対象（全項目共通）
            $id = Auth::id();
            // 必須更新
            // ユーザー名
            $username = $request->input('username');
            // メール
            $mail = $request->input('mail');
            // パスワード
            $new_password = $request->input('password');
            // HASHチェックで入力パスワード（平文）とDBのパスワード（HASH化）を比較
            $user = User::find($id);
            if (Hash::check($new_password, $user->password)) {
                // 一致したときの処理
                $passwordToStore = $user->password;
            } else {
                // 一致しなかったときの処理
                $passwordToStore = Hash::make($new_password);
            }
            // DB更新
            User::where('id', $id)->update([
                'username' => $username,
                'mail' => $mail,
                'password' => $passwordToStore,
            ]);
            // 自己紹介に入力がある場合
            if(!empty($request->input('bio'))){
            // DB更新
            $bio = $request->input('bio');
            User::where('id', $id)->update([
                'bio' => $bio,
            ]);
            }
            // アイコン画像に入力がある場合
            if(!empty($request->file('images'))){
                //①拡張子付きでファイル名を取得
                $filenameWithExt = $request->file('images')->getClientOriginalName();
                //②ファイル名のみを取得
                // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //③拡張子を取得
                // $extension = $request->file('images')->getClientOriginalExtension();
                //④日時を付与することで、同字ファイルの画像を保存可能にする
                // 同字ファイルの画像保存を禁止する場合、②③は不要※$filenameWithExtで更新
                // $filenameToStore = $filename.'_'.time().'.'.$extension;
                // DB更新
                User::where('id', $id)->update([
                    // 'images' => $filenameToStore,
                    'images' => $filenameWithExt,
                ]);
                // ファイルストレージ保存
                // $path = $request->file('images')->storeAs('public/images', $filenameToStore);
                $path = $request->file('images')->storeAs('public/images', $filenameWithExt);
            }
            // プロフィール編集画面に戻る
            return redirect('/top');
        }else{
            // プロフィール編集画面を表示
            return view('/users/profile_update');  //←GETだったら
        }

    }
}
