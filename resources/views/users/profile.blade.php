<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- posts/index.blade呼び出し  -->
<!-- contentセクション  -->
@section('content')
<!-- 相手ユーザーのプロフィールを表示 -->
 <div class="user_profile">
<?php
  // フォローしているユーザーのidを取得し、配列にする。
  $id = Auth::id();
  $followed_ids = DB::table('follows')->where('following_id',$id)->pluck('followed_id')->toArray();
?>
    <!-- ①ユーザアイコン -->
    <div class="profile_icon">
      <div class="user_icon">
        <img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン画像" >
      </div>
    </div>
    <div class="profile_main">
      <!-- ユーザー名 -->
      <div class='name_bio'>
        <div class = 'name_bio_header'>
          <h1>ユーザー名</h1>
        </div>
        <div class= 'name_bio_contents'>
          <p>{{ $user->username }}</p>
        </div>
      </div>
      <!-- 自己紹介 -->
      <div class='name_bio'>
        <div class = 'name_bio_header'>
          <h1>自己紹介</h1>
        </div>
        <div class= 'name_bio_contents'>
          <p>{{ $user->bio }}</p>
        </div>
      </div>
    </div>
    <!-- フォロー/フォロー解除 -->
     <div class="profile_follow">
       <div class="follow_remove">
         @if(in_array($user->id , $followed_ids))
         <!-- フォロー済：フォロー解除 -->
         <a class="btn btn_remove" href="/follows/{{ $user->id }}/delete">
           <p>フォロー解除</p>
          </a>
          @else
          <!-- フォロー未済：フォローする -->
          <a class="btn btn_follow" href="/follows/{{ $user->id }}/insert">
            <p>フォローする</p>
          </a>
          @endif
        </div>
      </div>
  </div>

<!-- 投稿表示 -->
<div class="post_timeline">
  <!-- ﾃﾞﾊﾞｯｸﾞ用・フォローリスト -->
  @foreach($posts as $post)
  <div class="post_block">
    <!-- postテーブルからuserテーブルを呼び出し、images,usernameを取得 -->
    <!-- ①ユーザアイコン -->
    <div class="user_icon">
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
