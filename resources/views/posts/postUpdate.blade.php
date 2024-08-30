@extends('layouts.login')
@section('content')
<!-- post編集機能 -->

<div class="postUpdateForm">
    <h2 class='page-header'>投稿内容を編集する</h2>
      {{ Form::open(['url' => ['/top/update']]) }}
    <div class="form-group">
      @csrf
      {{ Form::hidden('id', $post->id) }}
      {{ Form::label('修正する投稿内容を入力してください。') }}
      {{ Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-post']) }}
      {{ Form::button(Html::image('images/post.png', '投稿', ['width' => '30', 'height' => '30']), ['type' => 'submit']) }}

    </div>
      {{ Form::close() }}
</div>

  @endsection
