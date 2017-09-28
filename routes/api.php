<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/user', 'UserAPIController@index');
    Route::get('/api/user/{id}', 'UserAPIController@show');
    Route::post('/api/user', 'UserAPIController@store');
    Route::put('/api/user/{id}', 'UserAPIController@update');
    Route::delete('/api/user/{id}', 'UserAPIController@destroy');

    Route::get('/api/task', 'TaskAPIController@index');
    Route::get('/api/task/{id}', 'TaskAPIController@show');
    Route::post('/api/task', 'TaskAPIController@store');
    Route::put('/api/task/{id}', 'TaskAPIController@update');
    Route::delete('/api/task/{id}', 'TaskAPIController@destroy');

    Route::get('/api/comment', 'CommentAPIController@index');
    Route::get('/api/comment/{id}', 'CommentAPIController@show');
    Route::post('/api/comment', 'CommentAPIController@store');
    Route::put('/api/comment/{id}', 'CommentAPIController@update');
    Route::delete('/api/comment/{id}', 'CommentAPIController@destroy');    
});

*/