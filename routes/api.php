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
});*/
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
});
Route::group(array('prefix' => 'api'), function() {
    Route::resource('restful-apis','APIController');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/tasks', 'APIController@index');
    Route::get('/api/books/{id}', 'APIController@show');
    Route::post('/api/books', 'APIController@store');
    Route::put('/api/books/{id}', 'APIController@update');
    Route::delete('/api/books/{id}', 'APIController@destroy');
});
/*Route::group(['prefix' => 'api', 'middleware' => ['api', 'auth:api']], function() {
    Route::resource('taskmanagement','APIController');
});*/