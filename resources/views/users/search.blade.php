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

@endsection
