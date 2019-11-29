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



Route::get('/', 'HomeController@index')->name('index');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');
Route::post('/mine', 'HomeController@storeDetail')->name('postMine');
Route::get('/mine', 'HomeController@toMine')->name('getMine');

//@csrf
//method='POST'



Auth::routes();