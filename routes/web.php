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
Route::get('/admin', function () {
    return View::make('posts.index');
});
Route::get('/cre', function () {
    return View::make('createe');
});
Route::get('/hard', function () {
    return View::make('difficult.hard');
});
Route::get('/vh', function () {
    return View::make('difficult.veryH');
});
Route::get('/eh', function () {
    return View::make('difficult.extreH');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');
Route::resource('money', 'MoneyController');

