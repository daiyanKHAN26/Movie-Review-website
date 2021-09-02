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

Route::get('/', 'HomeController@index');
Route::get('/review/{movie_id}', 'ReviewController@create');
Route::get('/movie/show/{id}', 'HomeController@show');
Route::post('/review/store', 'ReviewController@store');

Auth::routes();


