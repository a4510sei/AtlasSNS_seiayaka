<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- posts/index.blade呼び出し  -->
<!-- contentセクション  -->
@section('content')

{!! Form::open(['url' => '/profile']) !!}
<!-- ユーザー名-->
{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}
<br>
<!-- アドレス-->
{{ Form::label('mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
<!-- パスワード-->
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
<br>
<!-- パスワード確認-->
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
<br>
<!-- 自己紹介-->
{{ Form::label('bio') }}
{{ Form::text('〇〇',null,['class' => 'input']) }}


@endsection
