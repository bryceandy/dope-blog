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

Route::get('/', function(){
    return view('welcome');
});
Route::get('/post/{post}', 'PostController@show');

Route::get('posts', 'PostController@index');

Route::get('register', function(){
    return view('auth.register');
});

Route::post('register', 'RegisterController@store');

Route::get('login', function (){
    return view('auth.login');
});

Route::get('logout', function(){

    auth()->logout();
    return view('auth.login');
});

Route::post('login', 'LoginController');