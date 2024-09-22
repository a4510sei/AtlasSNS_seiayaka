@extends('layouts.logout')

@section('content')
<div class="login">
  <div class="add">
    <div class=top>
      <h2>{{ $username }}さん</h2>
      <h2>ようこそ！AtlasSNSへ</h2>
    </div>
    <div class=bottom>
      <p>ユーザー登録が完了いたしました。</p>
      <p>早速ログインをしてみましょう！</p>
    </div>
    <div class="add_btn">
      <div class="btn">
        <div class="add_link"><a href="/login">ログイン画面へ</a></div>
      </div>
    </div>
  </div>

</div>

@endsection
