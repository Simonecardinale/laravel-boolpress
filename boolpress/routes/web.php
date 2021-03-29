<?php

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/posts', 'PostController@index')->name('guest.posts.index');
Route::get('/contatti', 'HomeController@contatti')->name('guest.contatti');

Route::post('/contatti', 'HomeController@contattiSent')->name('guest.contatti.sent');

Auth::routes();

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
Route::get('/', 'HomeController@index')->name('admin');
Route::resource('/post', 'PostController');
});
