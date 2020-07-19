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
    Route::get('login', 'Artists\LoginController@showLoginForm');
    Route::post('login', 'Artists\LoginController@login')->name('artist.login');
    Route::get('register', 'Artists\RegisterController@add')->name('artist.register');
    Route::post('register', 'Artists\RegisterController@create')->name('artist.create');
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
    Route::get('/mypage', 'Artists\WorkController@add')->name('artist.workadd');
    Route::get('profile/create', 'Artists\ProfileController@add');
    Route::post('profile/create', 'Artists\ProfileController@create');
    Route::get('profile/edit', 'Artists\ProfileController@edit');
    Route::post('profile/edit', 'Artists\ProfileController@update');
    Route::get('works/create', 'Artists\WorkController@add');
    Route::post('works/create', 'Artists\WorkController@create');
    Route::get('works/edit', 'Artists\WorkController@edit');
    Route::post('works/edit', 'Artists\WorkController@update');
});

Route::group(['middleware'=>'auth','prefix'=>'user/{id}'],function(){
    Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
    Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
});

Route::group(['middleware'=>'auth','prefix'=>'artist/{id}'],function(){
    Route::post('favorite','Artists\FavoriteController@store')->name('artist.favorites.favorite');
    Route::delete('unfavorite','Artists\FavoriteController@destroy')->name('artist.favorites.unfavorite');
});