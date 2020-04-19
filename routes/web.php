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
    logger()->info('hoge');
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
