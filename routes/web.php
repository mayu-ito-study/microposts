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

//Controller ( MicropostsController@index ) を経由してwelcomeを表示　↑の表記の上書き版
Route::get('/', 'MicropostsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'users/{id}'], function () {
        // n番目ユーザをフォローする
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        // n番目のユーザをアンフォローする
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        // n番目のユーザがフォローしているユーザ一覧を表示する
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        // n番目のユーザをフォローしているユーザ一覧を表示する
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        // お気に入り一覧を表示する
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
        // 追加
    Route::group(['prefix' => 'microposts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});