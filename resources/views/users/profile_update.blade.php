<!-- layouts/login.blade呼び出し  -->
@extends('layouts.login')
<!-- posts/index.blade呼び出し  -->
<!-- contentセクション  -->
@section('content')

<!-- プロフィール更新 -->
<div class="profile_update">
    <?php
    // ログインIDから現在のuser情報を取得
    $id = Auth::id();
    $user = DB::table('users')->find($id);
    ?>
    {!! Form::open(['url' => '/users/profile_update', 'files' => true]) !!}
    {{ Form::hidden('id', $id) }}
    @csrf
    <table class="profile_update_form">
      <tr>
        <th class="pro_icon"></th>
        <th class="pro_label"></th>
        <th class="pro_form"></th>
      </tr>
      <!-- ユーザー名-->
      <tr>
        <td><img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン画像" ></td>
        <td>{{ Form::label('ユーザー名') }}</td>
        <td>{{ Form::input('text', 'username', $user->username,['required', 'class' =>    'input_update']) }}</td>
      </tr>
      <!-- アドレス-->
      <tr>
        <td></td>
        <td>{{ Form::label('メールアドレス') }}</td>
        <td>{{ Form::input('text', 'mail',$user->mail,['required', 'class' => 'input_update']) }}</td>
      </tr>
      <!-- パスワード-->
      <tr>
        <td></td>
        <td>{{ Form::label('パスワード') }}</td>
        <td>{{ Form::password('password',['required', 'class' => 'input_update']) }}</td>
      </tr>
      <!-- パスワード確認-->
      <tr>
        <td></td>
        <td>{{ Form::label('パスワード確認') }}</td>
        <td>{{ Form::password('password_confirmation',['required', 'class' => 'input_update']) }}</td>
      </tr>
      <!-- 自己紹介-->
      <tr>
        <td></td>
        <td>{{ Form::label('自己紹介') }}</td>
        <td>{{ Form::input('text', 'bio',$user->bio,['class' => 'input_update', 'maxlength' => '150']) }}</td>
      </tr>
      <!-- アイコン画像 -->
      <tr>
        <td></td>
        <td>{{ Form::label('アイコン画像') }}</td>
        <td>{{ Form::file('images',['class' => 'img_update']) }}</td>
      </tr>
    </table>
      <!-- バリデーションチェック -->
    <div class="error_message">
        @if ($errors->has('mail'))
            <tr>
              <th>ERROR</th>
              @foreach($errors->get('mail') as $message)
              <td> {{ $message }} </td>
              @endforeach
            </tr>
        @endif
        <br>
        @if ($errors->has('password'))
            <tr>
              <th>ERROR</th>
              @foreach($errors->get('password') as $message)
              <td> {{ $message }} </td>
              @endforeach
            </tr>
        @endif
    </div>

    <!-- 更新ボタン -->
    <div class="submit_btn">
      <br>
      <button type="submit" class="btn btn-primary">更新</button>
    </div>
    {!! Form::close() !!}
</div>


@endsection
