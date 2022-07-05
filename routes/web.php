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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// 新規登録
Route::get('/added', 'Auth\RegisterController@added');
Route::get('/logout','Auth\LoginController@logout');//ログアウト



//ログイン中のページ
Route::get('/top','PostsController@index');

Route::post('/tweet','PostsController@tweet');//投稿

Route::get('/profile','UsersController@profile');//プロフィール

Route::get('/post/{id}/delete' , 'PostsController@delete');//削除

Route::get('/user/{id}/follow', 'PostsController@follow');//フォロー
Route::get('/user/{id}/remove', 'PostsController@remove');//フォロー外す


Route::get('/search','PostsController@search');// 検索
Route::post('/search-result','PostsController@searchResult');// 検索


Route::get('/follow-list','PostsController@followList');//フォローリスト

Route::get('/follower-list','PostsController@followerList');//フォロワーリスト

Route::post('/update','UsersController@update');//更新

Route::get('/{id}/partnerProfile','PostsController@partnerProfile');//相手プロフィール

Route::post('/post/edit','PostsController@edit'); //編集機能
