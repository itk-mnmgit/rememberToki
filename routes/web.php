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



Route::get('/', 'HomeController@index')->name('home.index');
Auth::routes();

// Route::group(['middleware' => ['auth']], function()
// {
    //この中に書かれたrouteはログインしていないと見れなくなる
<<<<<<< HEAD
    Route::get('/thanks', 'HomeController@thanks')->name('thanks');
    Route::post('/mine', 'HomeController@storeDetail')->name('postMine');
    Route::get('/mine', 'HomeController@toMine')->name('getMine');
// });
=======
    Route::get('/home/thanks', 'HomeController@thanks')->name('home.thanks');
    Route::post('/chat/index', 'HomeController@storeDetail')->name('post.chat.index');
    Route::get('/chat/index', 'ChatController@index')->name('get.chat.index');
    Route::get('/home/group', 'ChatController@toGroup')->name('home.group');
    Route::get('/event/index', 'EventController@index')->name('event.index');

// });
>>>>>>> 8b4c2004a1f7333194846242f40cc3ee1e7513ea
