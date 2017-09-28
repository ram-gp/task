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
    Route::get('/api/user', 'UserAPIController@index');
    Route::get('/api/user/{id}', 'UserAPIController@show');
    Route::post('/api/user', 'UserAPIController@store');
    Route::put('/api/user/{id}', 'UserAPIController@update');
    Route::delete('/api/user/{id}', 'UserAPIController@destroy');

    Route::get('/api/task', 'TaskAPIController@index');
    Route::get('/api/task/{id}', 'TaskAPIController@show');
    Route::get('/api/mytask', 'TaskAPIController@getMytasks');
    Route::post('/api/task', 'TaskAPIController@store');
    Route::put('/api/task/{id}', 'TaskAPIController@update');
    Route::delete('/api/task/{id}', 'TaskAPIController@destroy');

    Route::get('/api/comment', 'CommentAPIController@index');
    Route::get('/api/comment/{id}', 'CommentAPIController@show');
    Route::post('/api/comment', 'CommentAPIController@store');
    Route::put('/api/comment/{id}', 'CommentAPIController@update');
    Route::delete('/api/comment/{id}', 'CommentAPIController@destroy');    
});