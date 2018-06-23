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

Route::get('/main', 'UserController@home')->name('user.main');

Route::get('/quests', 'QuestController@allQuests')->name('quest.all');

Route::get('/{user}', 'UserController@userAllQuests')->name('user.quests');
Route::get('/{user}/profile', 'UserController@profile')->name('user.profile');
Route::get('/{user}/profile/edit', 'UserController@profileEdit')->name('user.profile-edit');
Route::put('/{user}/profile/update', 'UserController@profileUpdate')->name('user.profile-update');
Route::put('/{user}/profile/photoUpdate', 'UserController@userPhotoUpdate')->name('user.photo-update');
Route::get('/{user}/in_process', 'UserController@inProcess')->name('user.questsinprocess');
Route::get('/{user}/finished', 'UserController@finished')->name('user.questsfinished');
Route::get('/{user}/failed', 'UserController@failed')->name('user.questsfailed');

Route::post('/{user}/{quest}/start', 'UserController@startQuest')->name('user.start');
Route::post('/{user}/{quest}/finish', 'UserController@finishQuest')->name('user.finish');

Route::get('/{user}/{quest}', 'QuestController@quest')->name('quest.one');
Route::get('/{user}/quest/add', 'QuestController@questAdd')->name('quest.add');
Route::post('/{user}/quest/create', 'QuestController@questCreate')->name('quest.create');
Route::get('/{user}/{quest}/edit', 'QuestController@editQuest')->name('quest.edit');
Route::post('/{user}/{quest}/update', 'QuestController@updateQuest')->name('quest.update');
Route::delete('/{user}/{quest}/delete', 'QuestController@deleteQuest')->name('quest.delete');
