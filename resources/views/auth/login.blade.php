@extends('layouts.logout')

@section('content')

<div class="login">
  {!! Form::open(['url' => '/login']) !!}
  <div class="input_area">
    <h1>AtlasSNSへようこそ</h1>
    <!-- メールアドレス -->
    <div class="login_form">
      {{ Form::label('メールアドレス') }}
      <br>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <!-- パスワード -->
    <div class="login_form">
      {{ Form::label('パスワード') }}
      <br>
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <!-- ログイン -->
    <div class="submit_btn">
      <button type="submit" class="btn">ログイン</button>
    </div>
    <div class="login_link">
      <p><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
  </div>
  {!! Form::close() !!}
</div>

@endsection
