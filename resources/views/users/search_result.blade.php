<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- contentセクション  -->
@section('content')
<!-- ユーザー検索 -->
<div class="contents_head">
    {{ Form::open(['url' => '/users/search_result','method' => 'GET']) }}
    @csrf
  <div class="input_form">
    {{ Form::input('text', 'keyword', null, ['required', 'class' => 'form-search',  'placeholder' => 'ユーザー名']) }}
    {{ Form::button(Html::image('images/search.png', '検索', ['width' => '40', 'height'   => '40']), ['type' => 'submit']) }}
  </div>
    {!! Form::close() !!}
  <h1>検索ワード：{{ $keyword }}</h1>

</div>


<!-- ユーザー検索結果 -->
<div class="user_searchResult">
<?php
  // フォローしているユーザーのidを取得し、配列にする。
  $followed_ids = DB::table('follows')->where('following_id',$id)->pluck('followed_id')->toArray();
?>
    @foreach($users as $user)
    <!-- 自分以外のユーザーを表示 -->
        <!-- ①ユーザアイコン -->
        <div class="search_result_list">
          <!-- icon -->
          <div class="user_icon">
              <img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン画像" >
          </div>
          <!-- name -->
          <div class="follow_name">
            <p>
              {{ $user->username}}
            </p>
          </div>
          <!-- フォロー/フォロー解除 -->
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
    @endforeach
</div>

@endsection
