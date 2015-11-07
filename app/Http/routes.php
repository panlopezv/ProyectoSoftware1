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

Route::get('/', 'ControladorInicio@index');

Route::get('persona/{nombre}/{apellido}/{fecha}/{ubicacion}/{sexo}', 'ControladorPersona@insertarPersona');
Route::get('personas', 'ControladorPersona@index');
Route::get('personas/{id}', 'ControladorPersona@index2');


Route::resource('controladorPersona', 'ControladorPersona');
Route::resource('controladorUsuario', 'ControladorUsuario');

//busquedas
Route::resource('busquedas', 'ControladorBusqueda');
Route::get('busqueda/{b}', 'ControladorBusqueda@buscar');
Route::get('busqueda/categoria/{b}', 'ControladorBusqueda@buscarCategoria');
Route::get('busqueda', 'ControladorBusqueda@index');

//temas
Route::resource('controladorTema','ControladorTema');
Route::resource('controladorComentario', 'controladorComentario');
Route::get('nuevotema', 'ControladorTema@nuevoTema');
Route::get('temas/{idTema}', 'ControladorTema@index');
Route::get('temas/modificar/{id}', 'ControladorTema@edit');

//ejemplos
Route::resource('controladorEjemplo','ControladorEjemplo');
Route::get('nuevoejemplo/{temaid}', 'ControladorEjemplo@nuevoEjemplo');
Route::get('ejemplos/{idEjemplo}', 'ControladorEjemplo@index');

Route::get('registro', function () {
    return view('registro');
});
Route::get('iniciofallido', function () {
    return view('iniciofallido');
});
Route::get('inicio', function () {
    return view('inicio');
});

Route::get('prueba', function () {
    return view('BaseVista');
});
Route::get('base', function () {
    return view('registro');
});
