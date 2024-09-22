@extends('layouts.logout')

@section('content')
<div class="login">
  {!! Form::open(['url' => '/register']) !!}
  <div class="input_area">
    <h1>新規ユーザー登録</h1>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="login_form">
      {{ Form::label('ユーザー名') }}
      <br>
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    <div class="login_form">
      {{ Form::label('メールアドレス') }}
      <br>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="login_form">
      {{ Form::label('パスワード') }}
      <br>
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class="login_form">
      {{ Form::label('パスワード確認') }}
      <br>
      {{ Form::password('password_confirmation',['class' => 'input']) }}
    </div>
    <div class="submit_btn">
      <button type="submit" class="btn">新規登録</button>
    </div>
    <div class="login_link">
      <p><a href="/login">ログイン画面へ戻る</a></p>
    </div>
  </div>
{!! Form::close() !!}
</div>


@endsection
