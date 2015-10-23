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

Route::get('nuevoTema', 'ControladorCategoria@getCategorias');
Route::get('popo', 'ControladorCategoria@getCategorias2');

Route::resource('controladorTema','ControladorTema');

Route::get('registro', function () {
    return view('registro');
});
Route::get('tema/java/+', function () {
    return view('tema');
});
Route::get('base', function () {
    return view('base');
});
Route::get('usuario/{nombre}', function ($nombre=null) {
    return 'Hola '.$nombre;
})->where(array('nombre'=>'[A-Z][a-z]+'));