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
  @foreach($posts as $post)
  <p>名前：{{ $post->user->username }}</p>
  <p>投稿内容：{{ $post->post }}</p>
  @endforeach
</div>

@endsection
