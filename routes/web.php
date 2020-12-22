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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//ホーム画面表示
Route::get('/home', 'HomeController@index')->name('home');


//【ブログ（日記一覧）作成】


//ブログ一覧画面表示
Route::get('/posts', 'PostController@index')->name('posts.index');

//検索画面表示
//検索結果を送る
Route::post('/posts/search', 'PostController@search')->name('posts.search');

//ブログ新規登録画面表示
Route::get('/posts/create', 'PostController@create')->name('posts.create');

//ブログ登録画面表示
//投稿なのでpost
Route::post('/posts', 'PostController@store')->name('posts.store');

//ブログ詳細画面表示
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

//ブログ編集画面表示
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

//ブログ更新画面表示
//更新なのでPATCH
Route::PATCH('/posts/{post}', 'PostController@update')->name('posts.update');

//ブログ削除画面表示
//削除なのでdelete
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

//コメントを表示
//resourceで全てをまとめる
Route::resource('comments', 'CommentController');

//ユーザー投稿の一覧画面表示
//resourceで全てをまとめる
Route::resource('/users', 'UsersController', ['only' => ['show']]);

//いいね機能表示
//いいねを送るのでpost
//いいねを保存するのでstore
Route::post('posts/{post}/likes', 'LikeController@store')->name('likes');

//いいね取り消し機能表示
//いいね取り消しを送るのでpost
//いいねを削除するのでdestroy
Route::post('posts/{post}/unlikes', 'LikeController@destroy')->name('unlikes');

//お問い合わせページ表示【入力ページ】
Route::get('/contact', 'ContactController@index')->name('contact.index');

//お問い合わせページ表示【確認ページ】
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

//お問い合わせページ表示【送信完了ページ】
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');


//【タスク共有管理作成】


//タスク管理一覧ページを表示
Route::get('/tasks', 'TaskController@index')->name('tasks.index');

//タスク管理新規作成ページを表示
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');

//作成したものを送信して登録する
//送信なのでpost
Route::post('/tasks/store', 'TaskController@store')->name('tasks.store');

//タスク詳細画面を表示
Route::get('/tasks/{id}', 'TaskController@show')->name('tasks.show');

//タスク管理の編集ページを表示
Route::get('/tasks/{task_id}/edit', 'TaskController@showEdit')->name('tasks.edit');

//編集後、更新する
//更新なのでpost
Route::post('/tasks/{task_id}/edit', 'TaskController@edit');

//作成したものを削除する
//削除なのでdelete
Route::delete('/tasks/{task_id}', 'TaskController@destroy')->name('tasks.destroy');


//【連絡周知ページ作成】


// //連絡情報の一覧ページを表示
Route::get('/takes', 'TakeController@index')->name('takes.index');

//検索画面表示
//検索結果を送る
Route::post('/takes/search', 'takeController@search')->name('takes.search');

//新規作成画面を表示
Route::get('/takes/create', 'TakeController@create')->name('takes.create');

//作成したものを登録する
//登録して送信するのでpost
Route::post('/takes/store', 'TakeController@store')->name('takes.store');

// //連絡情報の詳細ページを表示
Route::get('/takes/{id}', 'TakeController@show')->name('takes.show');

//編集画面を表示
Route::get('/takes/edit/{id}', 'TakeController@edit')->name('takes.edit');

//編集完了後更新画面を表示
Route::post('/takes/update', 'TakeController@update')->name('takes.update');

Route::delete('/takes/{id}', 'TakeController@destroy')->name('takes.destroy');

//コメントを表示
//resourceで全てをまとめる
Route::resource('messages', 'MessageController');
























