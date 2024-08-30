@extends('layouts.login')

@section('content')
<!-- フォローリスト -->
<div class="follows">
  <div class="follows_title">
    <h1>フォロワーリスト</h1>
  </div>
  <div class="follows_list">
    @foreach($followers as $follower)
    <div class="follow_icon">
      <!-- フォローされているユーザーのアイコン画像を文字列で取得 -->
      <?php
        $images = DB::table('users')->where('id', $follower->following_id)->pluck('images')->first();
        ?>
      <img src="{{asset('images/'.$images)}}" alt="ユーザーアイコン画像" >
    </div>
    @endforeach
  </div>
</div>
<!-- 投稿表示 -->
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
    </div>
  </div>
    @endforeach
</div>


@endsection
