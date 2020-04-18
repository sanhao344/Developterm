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
    Route::post('profile/edit', 'Artists\ProfileController@edit')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
