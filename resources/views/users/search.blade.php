<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- contentセクション  -->
@section('content')
<!-- ユーザー検索 -->
<div class="user_search_form">
  {{ Form::open(['url' => ['/users/search_result']]) }}
  @csrf
  {{ Form::input('text', 'keyword', null, ['required', 'class' => 'form-post', 'placeholder' => 'ユーザー名']) }}
  {{ Form::button(Html::image('images/search.png', '検索', ['width' => '30', 'height' => '30']), ['type' => 'submit']) }}
</div>

<div class="user_searchResult">
  <!-- 引数を持たせないreturn処理のため、view内でSQL実行 -->
<?php
  $id = Auth::id();
  // 自分以外のユーザーを取得
  $users = DB::table('users')->Where('id','<>',$id)->get();
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
