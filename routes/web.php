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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/{user_login}/profile', 'UserController@profile')->name('user.profile');
Route::get('/{user_login}/profile/edit', 'UserController@profileEdit')->name('user.profile-edit');
Route::put('/{user_login}/profile/update', 'UserController@profileUpdate')->name('user.profile-update');
Route::get('/main', 'UserController@home')->name('user.main');
Route::get('/{user_login}', 'UserController@userAllQuests')->name('user.quests');
Route::get('/{user_login}/in_process', 'UserController@inProcess')->name('user.questsinprocess');
Route::get('/{user_login}/finished', 'UserController@finished')->name('user.questsfinished');
Route::get('/{user_login}/failed', 'UserController@failed')->name('user.questsfailed');

