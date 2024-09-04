<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- posts/index.blade呼び出し  -->
<!-- contentセクション  -->
@section('content')

<!-- プロフィール更新 -->
<div class="profile_update">

<?php
// ログインIDから現在のuser情報を取得
$id = Auth::id();
$user = DB::table('users')->find($id);
?>
{!! Form::open(['url' => '/users/profile_update', 'files' => true]) !!}
@csrf
<!-- ユーザー名-->
<div class="user_update_form">
  {{ Form::label('ユーザー名') }}
  {{ Form::input('text', 'username', $user->username,['required', 'class' => 'input']) }}
</div>
<!-- アドレス-->
<div class="user_update_form">
  {{ Form::label('メールアドレス') }}
  {{ Form::input('text', 'mail',$user->mail,['required', 'class' => 'input']) }}
</div>
<!-- パスワード-->
<div class="user_update_form">
  {{ Form::label('パスワード') }}
  {{ Form::password('password',['required', 'class' => 'input']) }}
</div>

<!-- パスワード確認-->
<div class="user_update_form">
  {{ Form::label('パスワード確認') }}
  {{ Form::password('password_confirmation',['required', 'class' => 'input']) }}
</div>

<!-- 自己紹介-->
<div class="user_update_form">
  {{ Form::label('自己紹介') }}
  {{ Form::input('text', 'bio',$user->bio,['class' => 'input']) }}
</div>

<!-- アイコン画像 -->
<div class="user_update_form">
  {{ Form::label('アイコン画像') }}
  {{ Form::file("images") }}
</div>

<!-- 更新ボタン -->
<button type="submit" class="btn btn-primary">更新</button>

{!! Form::close() !!}

</div>


@endsection
