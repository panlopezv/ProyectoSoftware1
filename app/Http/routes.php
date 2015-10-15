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
//Acceder a metodo de un controlador
Route::get('usuarios', 'ControladorUsuario@index');

Route::get('usuario/{nombre}', function ($nombre=null) {
    return 'Hola '.$nombre;
})->where(array('nombre'=>'[A-Z][a-z]+'));