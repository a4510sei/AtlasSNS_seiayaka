<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AtlasSNS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- JQuery-->
    <script src="js/jquery-1.12.4.min.js"></script>
</head>
<body>
    <header>
        <!-- サイトタイトル-->
        <div class = "site_title">
            <h1><a href="/top"><img src="/images/atlas.png" alt="ロゴ画像" ></a></h1>
        </div>
        <!-- ヘッダーサイド-->
        <div class="header_side">
            <!-- ユーザー名・ユーザーアイコン-->
            <div id="Username">
                <h2><?php $user = Auth::user(); ?> {{ $user->username }}　さん</h2>
            </div>
            <!-- メニュー-->
            <div id="nav">
                <!-- トリガーの部分 -->
                <p class="nav-open"></p>
                <!-- アコーディオンメニュー -->
                <nav>
                    <ul class="nav_list">
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/users/profile_update">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
                <!-- アコーディオンメニュー用jQuery-->
                <script>
                    $(function(){
                        //クリックで動く
                        $('.nav-open').click(function () {
                            $(this).toggleClass('active');
                            $(this).next('nav').slideToggle();
                        });
                    });
                </script>
            </div>
            <!-- ユーザーアイコン-->
            <div class="user_icon">
                <!-- usersテーブルから取得した画像ファイル名を呼び出し（相対パス） -->
                <img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン画像" >
            </div>
        </div>
    </header>
    <!-- メインコンテンツ -->
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
    <!-- サイドバー -->
        <div id="side-bar">
            <div id="confirm">
                <div class="side-username">
                    <p>{{ $user->username }}さんの</p>
                </div>
                <!-- フォロー数、フォロワー数をfollowsテーブルから取得 -->
                <?php
                $id = Auth::id();
                $following_cnt = DB::table('follows')->where('following_id',$id)->count();
                $followed_cnt = DB::table('follows')->where('followed_id',$id)->count();
                ?>
                <div class="view-follow">
                    <div class ="view-follow-text">
                      <p>フォロー数　　　　　{{ $following_cnt }}人</p>
                    </div>
                    <div class="view-follow-link">
                        <a class="btn btn-link" href="/follows/follow-list">フォローリスト</a>
                    </div>
                </div>
                <div class="view-follow">
                    <div class ="view-follow-text">
                      <p>フォロワー数　　　　{{ $followed_cnt }}人</p>
                    </div>
                    <div class="view-follow-link">
                      <a class="btn btn-link" href="/follows/follower-list">フォロワーリスト</a>
                    </div>
                </div>
                <div class="side-bar-border">
                </div>
                <div class="to-user-search">
                    <a class="btn btn-link" href="/users/search">ユーザー検索</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
