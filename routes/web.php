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

//Home
    Route::get('/home/thanks', 'HomeController@thanks')->name('home.thanks');
    Route::post('/chat/index', 'HomeController@storeDetail')->name('post.chat.index');

//Chat
    Route::get('/chat/index', 'ChatController@index')->name('get.chat.index');
    Route::get('/chat/listGroup', 'ChatController@toListGroup')->name('chat.listGroup');
    Route::get('/chat/makeGroup', 'ChatController@toMakeGroup')->name('chat.makeGroup');
    Route::post('/chat/confirm', 'ChatController@confirmGroup')->name('chat.confirm');
    Route::post('/chat/make', 'ChatController@makeGroup')->name('chat.make');
    Route::get('/group/search', 'ChatController@searchGroup')->name('group.search');


//Event
    Route::get('/event/index', 'EventController@index')->name('event.index');
    Route::get('/event/makeEvent', 'EventController@toMakeEvent')->name('event.makeEvent');
    Route::post('/event/confirm', 'EventController@confirmEvent')->name('event.confirm');
    Route::post('/event/make', 'EventController@makeEvent')->name('event.make');
    Route::get('/event/modalTrial', 'EventController@modal')->name('event.modalTrial');
    Route::get('/event/search', 'EventController@searchEvent')->name('event.search');

//Setting
    Route::get('/setting/index', 'SettingController@index')->name('setting.index');
    Route::post('setting/confirmProfile', 'SettingController@confirmChangeProfile')->name('setting.confirmProfile');
    Route::post('setting/changeProfile', 'SettingController@changeProfile')->name('setting.changeProfile');

    Route::get('/setting/help', 'SettingController@help')->name('setting.help');
    Route::post('setting/confirmHelp', 'SettingController@confirmHelp')->name('setting.confirmHelp');
    Route::post('setting/sendHelp', 'SettingController@sendHelp')->name('setting.sendHelp');

// });
