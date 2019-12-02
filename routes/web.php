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

// use Symfony\Component\Routing\Annotation\Route;

Route::get('/', 'HomeController@index')->name('home.index');
Auth::routes();

// Route::group(['middleware' => ['auth']], function()
// {
    //この中に書かれたrouteはログインしていないと見れなくなる
    Route::get('/home/thanks', 'HomeController@thanks')->name('home.thanks');
    Route::get('/home/listGroup', 'ChatController@toGroup')->name('home.listGroup');

    Route::get('/chat/index', 'ChatController@index')->name('get.chat.index');
    Route::post('/chat/index', 'HomeController@storeDetail')->name('post.chat.index');

    Route::get('/event/index', 'EventController@index')->name('event.index');

    Route::get('/setting/index', 'SettingController@index')->name('setting.index');
    Route::get('/setting/help', 'SettingController@help')->name('setting.help');
    Route::post('setting/thanks', 'SettingController@thanks')->name('setting.thanks');

// });
