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
Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index');
Route::get('/videos', 'PostController@loadVideos');
Route::get('/videos/{handle_url}', 'PostController@loadSingleVideo');
Route::get('/new/{handle_url}', 'PostController@loadSingleImage');

