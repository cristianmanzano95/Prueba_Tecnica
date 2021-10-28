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

//Route::get('/home', 'ProductoController@create')->name('crear_producto');
Route::get('/', 'ProductoController@create')->name('crear_producto');
Route::get('/producto/crear_producto', 'ProductoController@create')->name('crear_producto');
Route::post('/producto/crear_producto', 'ProductoController@insert')->name('crear_producto_backend');

Route::get('/producto/editar_producto', 'ProductoController@show')->name('editar_producto');
Route::post('/producto/editar_producto', 'ProductoController@update')->name('editar_producto_backend');

Route::get('/producto/editar_producto/{id}', 'ProductoController@display')->name('editar_producto_id');
Route::get('/producto/eliminar_producto/{id}', 'ProductoController@destroy')->name('eliminar_producto');



Route::get('/categoria/crear_categoria', 'CategoriaController@create')->name('crear_categoria');
Route::post('/categoria/crear_categoria', 'CategoriaController@insert')->name('crear_categoria_backend');

Route::get('/categoria/editar_categoria', 'CategoriaController@show')->name('editar_categoria');
Route::post('/categoria/editar_categoria', 'CategoriaController@update')->name('editar_categoria_backend');

Route::get('/categoria/editar_categoria/{id}', 'CategoriaController@display')->name('editar_categoria_id');
Route::get('/categoria/eliminar_categoria/{id}', 'CategoriaController@destroy')->name('eliminar_categoria');


