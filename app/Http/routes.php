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
//Route::get('persona/{id}', 'ControladorPersona@index');
Route::get('personas', 'ControladorPersona@index');
Route::get('personas/{id}', 'ControladorPersona@index2');
Route::get('registro', function () {
    return view('registro');
});
Route::get('tema/java/+', function () {
    return view('tema');
});
Route::get('prueba', function () {
    return view('BaseVista');
});
Route::get('base', function () {
    return view('registro');
});
Route::get('nuevos', function () {
    return view('crear');
});
Route::get('usuario/{nombre}', function ($nombre=null) {
    return 'Hola '.$nombre;
})->where(array('nombre'=>'[A-Z][a-z]+'));