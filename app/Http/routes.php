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
    return view('inicio');
});
//Acceder a metodo de un controlador
Route::get('persona/{nombre}/{apellido}/{fecha}/{ubicacion}/{sexo}', 'ControladorPersona@insertarPersona');
Route::get('personas', 'ControladorPersona@index');
Route::get('personas/{id}', 'ControladorPersona@index2');


Route::resource('controladorPersona', 'ControladorPersona');
Route::resource('controladorUsuario', 'ControladorUsuario');

Route::get('nuevoTema', 'ControladorCategoria@getCategorias');
Route::resource('controladorComentario', 'controladorComentario');
Route::get('nuevotema', 'ControladorCategoria@getCategorias');

//busquedas
Route::resource('busquedas', 'ControladorBusqueda');
Route::get('busqueda/{b}', 'ControladorBusqueda@buscar');
Route::get('busqueda', 'ControladorBusqueda@index');

Route::resource('controladorTema','ControladorTema');

//ejemplos
Route::resource('controladorEjemplo','ControladorEjemplo');
Route::get('nuevoejemplo/{temaid}', 'ControladorEjemplo@nuevoEjemplo');

Route::get('registro', function () {
    return view('registro');
});
Route::get('iniciofallido', function () {
    return view('iniciofallido');
});
Route::get('inicio', function () {
    return view('inicio');
});

Route::get('temas/{idTema}', 'ControladorTema@index');

Route::get('prueba', function () {
    return view('BaseVista');
});
Route::get('base', function () {
    return view('registro');
});
Route::get('usuario/{nombre}', function ($nombre=null) {
    return 'Hola '.$nombre;
})->where(array('nombre'=>'[A-Z][a-z]+'));

Route::get('prueba', function () {
    return view('crear2');
});
