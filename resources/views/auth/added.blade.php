@extends('layouts.logout')

<div id="clear">
@section('content')


  <div class=top>
  <h1>{{$users->username}}さん</h1>
  <h1>ようこそ！AtlasSNSへ！</h1>
</div>

  <div class=bottom>
  <h2>ユーザー登録が完了しました。</h2>
  <h2>早速ログインをしてみましょう。</h2>
</div>

  <div class="btn"><a href="/login">ログイン画面へ</a></div>
</div>

@endsection
