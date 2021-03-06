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
Route::get('/check_relationship_status/{id}',[
    'uses' => 'FriendshipsController@check',
    'as' => 'check'
]);
Route::get('/add_friend/{id}',[
    'uses' => 'FriendshipsController@add_friend',
    'as' => 'add_friend'
]);
Route::get('/accept_friend/{id}',[
    'uses' => 'FriendshipsController@accept_friend',
    'as' => 'accept_friend'
]);
Route::get('get_unread',function(){
    return Auth::user()->unreadNotifications;
});
Route::get('/notifications',[
    'uses' => 'HomeController@notifications',
    'as' => 'notifications'
]);
Route::get('/feed',[
    'uses' => 'FeedsController@feed',
    'as' => 'feed'
]);
Route::get('/feed/likes/{post_id}',[
    'uses' => 'FeedsController@feeds_like',
    'as' => 'feed'
]);

Route::get('/get_auth_user_data',function (){
    return Auth::user();
});

Route::get('/like/{id}',[
    'uses' => 'LikeController@like',
]);
Route::get('/unlike/{id}',[
    'uses' => 'LikeController@unlike',
]);


Route::post('/create/post',[
    'uses' => 'PostsController@store'
]);
//Route::post('/create/postt',function (){
//    return "Rota teste good. for Get";
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{slug}',[
        'uses'=>'ProfileController@index',
        'as' => 'profile'//Dando pseudonimo a rota.
    ]);
    Route::get('/profile/edit/profile',[
        'uses'=>'ProfileController@edit',
        'as' => 'profile.edit'//Dando   pseudonimo a rota.
    ]);
    Route::post('/profile/update/profile',[
        'uses'=>'ProfileController@update',
        'as' => 'profile.update'//Dando pseudonimo a rota.
    ]);
});

