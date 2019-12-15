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

Route::get('/', function(){
    return view('welcome');
})->name('welcome');

Route::get('register', 'RegisterController@edit')->name('register');

Route::post('register', 'RegisterController@store');

Route::get('login', 'LoginController@edit')->name('login');

Route::post('login', 'LoginController@store');

Route::get('logout', 'LoginController@destroy')->name('logout');


/*Route::get('posts/{post}', 'PostController@show');

Route::get('posts', 'PostController@index');

Route::get('posts/create', 'PostController@create');

Route::post('posts', 'PostController@store');*/

Route::resource('posts', 'PostController');


Route::post('posts/{post}/comments', 'CommentController@store')->middleware(['auth', 'can:comment,post']);
