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
Route::get('/', ['as' => 'principal', 'uses' => 'front\FrontController@index']);
Route::get('/nosotros', ['as' => 'nosotros', 'uses' => 'front\FrontController@nosotros']);
Route::get('/contacto', ['as' => 'contacto', 'uses' => 'front\FrontController@contacto']);
Route::get('/productos', ['as' => 'productos', 'uses' => 'front\FrontController@productos']);

/***********************Login y User***********************/
Route::resource('login', 'back\LoginController');
Route::get('logout', ['as' => 'logout', 'uses' => 'back\LoginController@logout']);
Route::get('restaurar-contrasena', ['as' => 'restaurarContrasena', 'uses' =>'back\LoginController@changePassword']);
Route::post('postChangePassword', ['as' => 'postChangePassword', 'uses' =>'back\LoginController@postChangePassword']);
Route::get('/selectUsuario/{id}', ['as' => 'selectusuario', 'uses' => 'back\LoginController@preguntaUsuarioSeleccionado']);
Route::get('/nueva-contrasena/{id}', ['as' => 'nuevaContrasena', 'uses' =>'back\LoginController@nuevoPassword']);
Route::post('postNewPassword', ['as' => 'postNewPassword', 'uses' =>'back\LoginController@postNewPassword']);

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
	Route::get('/reportes', ['as' => 'reportes', 'uses' => 'back\ReporteController@consulta']);
	Route::post('reportes/resultados', ['as' => 'consultar.store', 'uses' => 'back\ReporteController@buscar']);
});