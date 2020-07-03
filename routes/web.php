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

Route::group(['prefix' => 'artist'], function() {
    Route::get('profile/create', 'Artists\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Artists\ProfileController@create')->middleware('auth');
    Route::get('profile/edit', 'Artists\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Artists\ProfileController@update')->middleware('auth');
    Route::get('works/create', 'Artists\WorkController@add')->middleware('auth');
    Route::post('works/create', 'Artists\WorkController@create')->middleware('auth');
    Route::get('works/edit', 'Artists\WorkController@edit')->middleware('auth');
    Route::post('works/edit', 'Artists\WorkController@update')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/home'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {

    \Log::debug("ログ出力テスト");

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/category/', 'WorkController@category');
    Route::get('/user/show/', 'WorkController@show');
    Route::get('/user/index', 'WorkController@index');
});

/*
|--------------------------------------------------------------------------
| 3) Artist 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'artist'], function() {
    Route::get('home', 'Artists\HomeController@index')->name('artist.home');
    Route::get('login', 'Artists\LoginController@showLoginForm')->name('artist.login');
    Route::post('login', 'Artists\LoginController@login');
});
 
/*
|--------------------------------------------------------------------------
| 4) Artist ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'artist', 'middleware' => 'auth:artist'], function() {
    Route::post('/logout', 'Artists\LoginController@logout')->name('artist.logout');
    Route::get('/category', 'Artists\WorkController@category');
    Route::get('/show', 'Artists\WorkController@show');
    Route::get('/index', 'Artists\WorkController@index');
    Route::get('/mypage', 'Artists\ArtistController@mypage')->name('artist.mypage');
});

Route::group(['middleware'=>'auth','prefix'=>'user/{id}'],function(){
    Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
    Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
});

Route::group(['middleware'=>'auth','prefix'=>'artist/{id}'],function(){
    Route::post('favorite','Artists\FavoriteController@store')->name('artist.favorites.favorite');
    Route::delete('unfavorite','Artists\FavoriteController@destroy')->name('artist.favorites.unfavorite');
});