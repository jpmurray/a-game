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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-faction', 'FactionController@create')->name('new-faction.create');
Route::post('/new-faction', 'FactionController@store')->name('new-faction.save');

Route::group(['middleware' => 'ingame'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
