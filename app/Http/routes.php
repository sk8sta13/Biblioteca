<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

// Authentication routes
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes
Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

// Password reset link request routes
Route::get('forgot', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('forgot', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Route::get('profile', ['middleware' => 'auth', function() {
	//Route::resource('books', ['middleware' => 'auth', 'uses' => 'BookController']);
//}]);
Route::group(['middleware' => 'auth'], function() {
	Route::resource('books', 'BookController');
});
/*Route::get('books', ['as' => 'books.index', 'uses' => 'BookController@index', 'middleware' => 'auth']);
Route::get('books/{$id}', ['as' => 'books.show', 'uses' => 'BookController@show', 'middleware' => 'auth']);
Route::get('books/create', ['as' => 'books.create', 'uses' => 'BookController@create', 'middleware' => 'auth']);
Route::post('books/store', ['as' => 'books.store', 'uses' => 'BookController@store', 'middleware' => 'auth']);
Route::get('books/{$id}', ['as' => 'books.edit', 'uses' => 'BookController@edit', 'middleware' => 'auth']);
Route::put('books/{$id}', ['as' => 'books.update', 'uses' => 'BookController@update', 'middleware' => 'auth']);
Route::delete('books/{$id}', ['as' => 'books.destroy', 'uses' => 'BookController@destroy', 'middleware' => 'auth']);*/