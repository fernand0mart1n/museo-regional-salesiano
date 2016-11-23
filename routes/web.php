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
Route::patch('/usuarios/estado/{id}', 'UserController@estado');
Route::get('/usuarios/rol/{id}', 'UserController@rol');
Route::get('/usuarios/autorizar', 'UserController@autorizar');
Route::get('/piezas/fotos/{id}', 'PiezaController@cargarFotos');
Route::post('/piezas/fotos/{id}', 'PiezaController@subirFotos');
Route::get('/piezas/ver/{id}', 'PiezaController@verFotos');

Route::get('storage/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
});

Route::resource('fondos','FondoController');
Route::resource('clasificaciones','ClasificacionController');
Route::resource('personas','PersonaController');
Route::resource('revisiones','RevisionController');
Route::resource('piezas','PiezaController');