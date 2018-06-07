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

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/{user_login}/profile', 'UserController@profile')->name('user.profile');
