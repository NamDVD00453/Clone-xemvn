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
use \Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index.home');
//});
Route::get('/test', 'IndexController@test');

Route::group(['prefix' => 'videos'], function () {
    Route::get('/', 'VideosController@index')
        ->middleware('load_suggest_post')
        ->name('videos.index');
    Route::get('/more-content', 'VideosController@loadNewVideoComponent')->name('videos.more_content');
    Route::get('/old', 'VideosController@old')->name('videos.old');
    Route::get('/hot', 'VideosController@hot')->name('videos.hot');
    Route::get('/{handle_url}', 'VideosController@singleVideo')
        ->middleware('load_suggest_post')
        ->name('videos.single');
});

Route::group(['prefix' => '/'], function() {
    Route::get('/', 'IndexController@index')
        ->middleware('load_suggest_post')
        ->name('index');
    Route::get('/old', 'IndexController@old')->name('index.old');
    Route::get('/hot', 'IndexController@hot')->name('index.hot');
    Route::get('/{handle_url}', 'IndexController@singleImage')
        ->middleware('load_suggest_post')
        ->name('index.single');
});


