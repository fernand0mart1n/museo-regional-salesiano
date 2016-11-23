<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/datos', 'HomeController@datos');
Route::get('/usuarios', 'UserController@index');
Route::get('/usuarios/{id}', 'UserController@show', function ($id) {})->where('id', '[0-9]+');
Route::get('/usuarios/{id}/rol', 'UserController@rol');
Route::patch('/usuarios/estado/{id}', 'UserController@estado');
Route::get('/usuarios/autorizar', 'UserController@autorizar');

Route::resource('fondos','FondoController');
Route::resource('clasificaciones','ClasificacionController');
Route::resource('personas','PersonaController');
Route::resource('revisiones','RevisionController');
Route::resource('piezas','PiezaController');