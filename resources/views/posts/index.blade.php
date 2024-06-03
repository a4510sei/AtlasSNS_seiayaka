@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>
@foreach($posts as $post)
<p>名前：{{ $post->user->username }}</p>
<p>投稿内容：{{ $post->post }}</p>
@endforeach

@endsection
