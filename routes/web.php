<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::get('/', 'Fontend\layoutController@index');

Route::group(['prefix' => 'users', 'namespace'=>'users'], function () {
    Route::get('login', "userController@index")->name('get.login');
    Route::post('login', "userController@PostLogin")->name('post.login');
    Route::get('registered', "userController@create")->name('get.registered');
    Route::post('registered', "userController@store")->name('post.registered');
    Route::get('logout', "userController@logout")->name('get.logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace'=>"BackEnd"], function () {

    Route::group(['prefix' => 'music'], function () {
        Route::group(['prefix' => 'Category'], function () {
            Route::get('new', 'CategorySongController@create')->name('get.categorySong.new');
            Route::post('new', 'CategorySongController@store')->name('post.categorySong.new');
            Route::get('delete/{id}', 'CategorySongController@destroy')->name('get.categorySong.delete');
            Route::get('update/{id}', 'CategorySongController@edit')->name('get.categorySong.update');
            Route::post('update', 'CategorySongController@update')->name('post.categorySong.update');
        });
        
        Route::group(['prefix' => 'singer'], function() {
            Route::get('new', 'SingerController@create')->name('get.singer.new');
            Route::post('new', 'SingerController@store')->name('post.singer.new');
            Route::get('delete/{id}','SingerController@destroy')->name('get.singer.delete');
            
            Route::get('update/{id}', 'SingerController@edit')->name('get.singer.update');
            Route::post('update', 'SingerController@update')->name('post.singer.update');
        });
        
        Route::group(['prefix' => 'song'], function () {
            Route::get('new', 'MusicController@create')->name('get.music.new');
            Route::post('new', 'MusicController@store')->name('post.music.new');
            Route::get('update/{id}', 'MusicController@edit')->name('get.music.update');
            Route::post('update', 'MusicController@update')->name('post.music.update');
            Route::get('delete/{id}', 'MusicController@destroy')->name('get.music.delete');
        });
        
    });
    
});

Route::group(['prefix' => 'music', 'namespace'=>'Frontend'], function () {
    Route::get('song', 'songController@index')->name('get.fr.song.index');
    Route::get('song/{id}/{name}','songController@show')->name('get.fr.song.show');
});
