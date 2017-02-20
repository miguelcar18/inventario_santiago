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

/***********************Inicio***********************/
Route::get('/', function(){
	return Redirect::route('dashboard');
});

/***********************Login y User***********************/
Route::resource('login', 'back\LoginController');
Route::get('logout', ['as' => 'logout', 'uses' => 'back\LoginController@logout']);
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['before' => 'auth', 'prefix' => 'dashboard'], function () {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'back\BackController@index']);
	Route::resource('usuarios', 'back\UsuarioController');
	Route::get('profile/change-password', ['as' => 'change_password', 'uses' => 'back\LoginController@changePassword']);
	Route::post('profile/change-password', ['as' => 'change_password_post', 'uses' => 'back\LoginController@postChangePassword']);
	Route::get('/imagenUsuario/{id}', ['as' => 'imagenusuario', 'uses' => 'back\UsuarioController@cambiarImagenEditar']);
	Route::resource('clientes', 'back\ClienteController');
	Route::resource('productos', 'back\ProductoController');
	Route::get('/imagenProducto/{id}', ['as' => 'imagenproducto', 'uses' => 'back\ProductoController@cambiarImagenEditar']);
	Route::resource('inventario', 'back\InventarioController');
	Route::resource('ventas', 'back\VentaController');
	Route::get('/selectProducto/{id}', ['as' => 'selectproducto', 'uses' => 'back\InventarioController@totalProductoSeleccionado']);
});