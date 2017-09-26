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
    Route::get('/api/tasks', 'APIController@index');
    Route::get('/api/books/{id}', 'APIController@show');
    Route::post('/api/books', 'APIController@store');
    Route::put('/api/books/{id}', 'APIController@update');
    Route::delete('/api/books/{id}', 'APIController@destroy');
});