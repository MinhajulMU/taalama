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
    return view('front.index');
});
Route::get('/tes', function () {
    return view('front.index');
});
Route::get('/topik', function () {
    return view('front.topik');
});
Route::get('/question', function () {
    return view('front.question');
});
Route::get('/benar', function () {
    return view('front.benar');
});
Route::get('/salah', function () {
    return view('front.salah');
});
Route::get('/daftar', function () {
    return view('front.register');
});
Route::get('/masuk', function () {
    return view('front.login');
});
Route::get('/selesai', function () {
    return view('front.selesai');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
