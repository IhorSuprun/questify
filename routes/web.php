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

Route::get('/', 'PageController@index');

Auth::routes();

Route::get('/{user_login}/profile', 'UserController@profile')->name('user.profile');
Route::get('/main', 'UserController@home')->name('user.main');
Route::get('/{user_login}', 'UserController@userAllQuests')->name('user.quests');
