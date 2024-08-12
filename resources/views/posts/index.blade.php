@extends('layouts.login')

@section('content')

<!-- 投稿機能を実装create -->
<!-- 7/30 投稿フォームOK、実際のDBinsetまでは行ってない -->
<div>
  {!! Form::open(['url' => '/top']) !!}
  @csrf
  {{ Form::input('text', 'post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}
  {{ Form::submit('投稿') }}
  {!! Form::close() !!}
</div>

<!-- 投稿表示 -->
<div>
  <tr>
    @foreach($posts as $post)
<!-- postテーブルからuserテーブルを呼び出し、images,usernameを取得 -->
    <p><img src="{{asset('images/'.$post->user->images)}}" alt="ユーザーアイコン画像" > {{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    @endforeach
  </tr>
</div>

@endsection
