@extends('layouts.login')

@section('content')

<!-- 投稿機能 -->
<div class="post_input_form">
  {!! Form::open(['url' => '/top']) !!}
  @csrf
  {{ Form::input('text', 'post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}
  {{ Form::submit('投稿') }}
  {!! Form::close() !!}
</div>

<!-- 投稿表示 -->
<div>
</div>
<div class="post_timeline">
  <!-- ﾃﾞﾊﾞｯｸﾞ用・フォローリスト -->
  @foreach($posts as $post)
  <div class="post_block">
    <!-- postテーブルからuserテーブルを呼び出し、images,usernameを取得 -->
    <!-- ①ユーザアイコン -->
    <div class="posts_icon">
      <img src="{{asset('images/'.$post->user->images)}}" alt="ユーザーアイコン画像" >
    </div>
    <!-- ②ポストエリア（ユーザー名・ポスト） -->
    <div class="post_textarea">
      <div class="post_user">
        <h1>{{ $post->user->username }}</h>
      </div>
      <div class="post_text">
        <p>{{ $post->post }}</p>
      </div>
    </div>
    <!-- ③更新時刻・編集用エリア -->
    <div class="post_edit_time">
      <!-- 更新日時16桁（yyyy-mm-dd hh:mm) -->
      <div class="update_time">
        <p>{{ substr($post->updated_at,0,16) }}</p>
      </div>
      <!-- postのユーザーが自分である時のみ編集・削除 -->
      @if ($post->user->id == $user_id)
        <div class="edit_trash">
          <!-- 編集ボタン -->
          <div class="edit">
              <a class="btn btn-primary" href="/top/{{ $post->id }}/update-form">
                <img src="images/edit.png"alt="編集する">
              </a>
          </div>
          <!-- 削除ボタン -->
          <div class="trash">
            <a class="btn btn-danger" href="/top/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
              <!-- 削除ボタン：白　ホバー時は消す -->
              <img src="images/trash.png" alt="削除する" >
              <!-- 削除ボタン：赤　ホバー時に出現 -->
              <img src="images/trash-h.png" alt="削除する" >
            </a>
          </div>
        </div>
      @endif
    </div>
  </div>
    @endforeach
</div>

  @endsection
