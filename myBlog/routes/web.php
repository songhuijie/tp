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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/index', 'IndexController@index')->name('index');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/new', 'IndexController@NewView')->name('new');
Route::get('/newList', 'IndexController@newList')->name('newList');
Route::get('/share', 'IndexController@share')->name('share');



//文件上传
Route::any('file/img','File\FileController@img');


//auth 登录 注册
//auth 登录 注册
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//auth 登录 注册
//auth 登录 注册

Route::get('/home', 'HomeController@index')->name('home');
