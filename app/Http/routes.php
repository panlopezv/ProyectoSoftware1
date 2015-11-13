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

//perfil
Route::get('perfil','ControladorPerfil@index');
Route::get('perfil/escritores','ControladorPerfil@mostrarEscritores');
Route::get('perfil/temas','ControladorPerfil@mostrarTemas');
Route::get('perfil/nuevotema','ControladorPerfil@nuevoTema');
Route::get('perfil/nuevacategoria','ControladorPerfil@nuevaCategoria');


//categoria
Route::resource('controladorCategoria','ControladorCategoria');
Route::resource('controladorcategoria','ControladorCategoria');
Route::get('nuevacategoria','ControladorCategoria@nuevaCategoria');
Route::get('categorias', 'ControladorCategoria@index');
Route::get('categorias/{b}', 'ControladorBusqueda@buscarCategoria');

//busquedas
Route::resource('busquedas', 'ControladorBusqueda');
Route::get('busqueda/{b}', 'ControladorBusqueda@buscar');
Route::get('busqueda', 'ControladorBusqueda@index');

//temas
Route::resource('controladorTema','ControladorTema');
Route::resource('controladorComentario', 'ControladorComentario');
Route::get('nuevotema', 'ControladorTema@nuevoTema');
Route::get('temas/{idTema}', 'ControladorTema@index');
Route::get('temas/modificar/{id}', 'ControladorTema@edit');

//ejemplos
Route::resource('controladorEjemplo','ControladorEjemplo');
Route::get('nuevoejemplo/{temaid}', 'ControladorEjemplo@nuevoEjemplo');
Route::get('ejemplos/{idEjemplo}', 'ControladorEjemplo@index');

//sesion
Route::resource('sesion','ControladorSesion');
Route::resource('actualizar','ControladorActualizar');
Route::get('cerrarSesion', 'ControladorSesion@cerrarSesion');
Route::get('modificardatos', 'ControladorActualizar@index');
//contactanos
Route::get('inicio', function () {
    return view('Inicio');
});
Route::get('registro', function () {
    return view('Registro');
});
Route::get('iniciofallido', function () {
    return view('InicioFallido');
});

Route::get('InformacionPerfil', function () {
    return view('InformacionPerfil');
});

Route::get('CompletarInformacion', function () {
    return view('CompletarInformacion');
});

Route::get('acercade', function () {
    return view('QuienesSomos');
});

Route::get('prueba', function () {
    return view('BaseVista');
});
Route::get('base', function () {
    return view('registro');
});
