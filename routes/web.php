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

Route::group(['middleware' => 'auth', 'prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index');
    Route::get('create', 'PostController@create');
    Route::post('store', 'PostController@store');
    Route::get('view/{id}', 'PostController@view')->where(['id' => '[0-9]']);
    Route::get('edit/{id}', 'PostController@edit')->where(['id' => '[0-9]']);
    Route::post('update/{id}', 'PostController@update')->where(['id' => '[0-9]']);
    Route::get('destroy/{id}', 'PostController@destroy')->where(['id' => '[0-9]']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
