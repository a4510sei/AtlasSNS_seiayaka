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
      {{ Form::input('text', 'upPost', null, ['required', 'class' => 'form-post', 'placeholder' => $post->post]) }}
      {{ Form::submit('編集') }}
    </div>
      {{ Form::close() }}
</div>

  @endsection
