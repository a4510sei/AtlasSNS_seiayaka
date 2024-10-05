@extends('layouts.login')

@section('content')

<!-- 投稿機能 -->
 <div class="contents_head">
   {!! Form::open(['url' => '/top']) !!}
   @csrf
   <div class="input_form">
     <!-- ユーザアイコン -->
     <?php $user = Auth::user(); ?>
     <div class="user_icon">
       <img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン画像" >
      </div>
      {{Form::textarea('post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。', 'maxlength' => '150', 'cols' => '100','rows' => '3'])}}
      {{ Form::button(Html::image('images/post.png', '投稿', ['class' => 'post_submit','width' => '50', 'height' => '50']), ['type' => 'submit']) }}
    </div>
    {!! Form::close() !!}
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
      <!-- postのユーザーが自分である時のみ編集・削除 -->
      @if ($post->user->id == $user_id)
        <div class="edit_trash">
          <!-- 編集ボタン -->
          <div class="edit">
            <!-- モーダルで編集画面を開く -->
            <a class="js-modal-open" href="" post="{{ $p_post = $post->post }}" post_id="{{ $p_id = $post->id }}"><img src="images/edit.png"alt="編集する"></a>
          </div>
          <!-- 削除ボタン -->
          <div class="trash">
            <a href="/top/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
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
   <!-- モーダルの中身 -->
    <script>
        $(function(){
            // 編集ボタン(class="js-modal-open")が押されたら発火
            $('.js-modal-open').on('click',function(){
                // モーダルの中身(class="js-modal")の表示
                $('.js-modal').fadeIn();
                // 押されたボタンから投稿内容を取得し変数へ格納
                var up_post = $(this).attr('post');
                // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
                var post_id = $(this).attr('post_id');

                // 取得した投稿内容をモーダルの中身へ渡す
                $('.modal_post').text(up_post);
                // 取得した投稿のidをモーダルの中身へ渡す
                $('.modal_id').val(post_id);
                return false;
            });

            // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
            $('.js-modal-close').on('click',function(){
                // モーダルの中身(class="js-modal")を非表示
                $('.js-modal').fadeOut();
                return false;
            });
        });
    </script>
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/top/update" method="post">
            <input type="hidden" name="post_id" class="modal_id" value="">
            <div class="up_post_form">
              <textarea name="up_post" class="modal_post" maxlength="150" cols = "80" rows = "5" ></textarea>
            </div>
            <div class="up_post_btn">
              {{ Form::button(Html::image('images/edit.png', '投稿', ['width' => '30', 'height' => '30']), ['type' => 'submit','class' => 'submit']) }}
            </div>
            {{ csrf_field() }}
            {{ Form::close() }}
            <a class="js-modal-close" href=""></a>
        </div>
    </div>
</div>
@endsection
