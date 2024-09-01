<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Laravel起動確認ページ用
Route::get('/', function () {

  return view('welcome');
});
//Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
//Route::post('/added', 'Auth\RegisterController@added');

//auth認証後のみ表示
Route::group(['middleware' => 'auth'], function() {
//ログイン中のページ
//auth認証解決後、middleware('auth')付きに戻す
//    Route::get('/home','HomeController@index');//top、PostsController@に戻す
    Route::get('/top','PostsController@index');
    Route::post('/top','PostsController@postCreate');
// ポスト編集
    Route::get('/top/{id}/update-form','PostsController@postUpdateForm');
    Route::post('/top/update','PostsController@postUpdate');
// ポスト削除
    Route::get('/top/{id}/delete','PostsController@postDelete');
// プロフィール編集
    Route::get('/users/profile/update','UsersController@profileUpdate');
// ユーザー検索
    Route::get('/users/search','UsersController@search');
    Route::post('/users/search_result','UsersController@searchResult');
// フォローリスト・フォロワーリスト
    Route::get('/follows/follow-list','FollowsController@followList');
    Route::get('/follows/follower-list','FollowsController@followerList');
// フォロー登録・フォロー解除
    Route::get('/follows/{id}/delete','FollowsController@followDelete');
    Route::get('/follows/{id}/insert','FollowsController@followInsert');
// プロフィール
    Route::get('/users/{id}/profile','UsersController@profile');
// ログアウト
    Route::get('/logout','Auth\LoginController@logout');
});
