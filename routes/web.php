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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Route::group(['prefix' => 'api'], function() {
    Route::resource('taskmanagement','APIController');
});
Route::group(array('prefix' => 'api'), function() {
    Route::resource('restful-apis','APIController');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/api/tasks', 'APIController@index');
    Route::get('/api/books/{id}', 'APIController@show');
    Route::post('/api/books', 'APIController@store');
    Route::put('/api/books/{id}', 'APIController@update');
    Route::delete('/api/books/{id}', 'APIController@destroy');
});*/
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/search/', 'APIController@search');

    Route::get('/api/user', 'UserApiController@index');
    Route::get('/api/user/{id}', 'UserApiController@show');
    Route::post('/api/user', 'UserApiController@store');
    Route::put('/api/user/{id}', 'UserApiController@update');
    Route::delete('/api/user/{id}', 'UserApiController@destroy');

    Route::get('/api/task', 'TaskApiController@index');
    Route::get('/api/task/{id}', 'TaskApiController@show');
    Route::post('/api/task', 'TaskApiController@store');
    Route::put('/api/task/{id}', 'TaskApiController@update');
    Route::delete('/api/task/{id}', 'TaskApiController@destroy');

    Route::get('/api/comment', 'CommentApiController@index');
    Route::get('/api/comment/{id}', 'CommentApiController@show');
    Route::post('/api/comment', 'CommentApiController@store');
    Route::put('/api/comment/{id}', 'CommentApiController@update');
    Route::delete('/api/comment/{id}', 'CommentApiController@destroy');    
});