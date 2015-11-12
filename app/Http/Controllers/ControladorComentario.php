<?php

namespace App\Http\Controllers;

use App\Comentario as Comentario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
* ControladorComentario.php - Clase que sirve para obtener y enviar informacion de la entidad Comentario a la base de datos.
* @author panlopezv
*/
class ControladorComentario extends Controller
{
/**
* Guarda una nuevo comentario en el tema actual en la base de datos.
* @param  Contenido y temaid del nuevo tema a crear. $request
* @return Si los datos son validos guarda el tema y redirige al tema comentado, sino redirige a la vista anterior con los errores correspondientes.
*/
public function store(Request $request)
{
    if(isset($_COOKIE['id'])){
        $validador = Validator::make($request->all(),[
            'comentario'        => 'required',
            ],[
            'required' => 'El campo :attribute es obligatorio.',
            ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            ControladorComentario::insertarComentario($request->input('comentario'), $request->input('temaid'), $_COOKIE['id']);
            return redirect('/temas/'. $request->input('temaid'));
        }
    }
    else{
        return redirect('/iniciofallido');
    }
}

/**
* Elimina una categoria en especifico de la base de datos.
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $comentario = Comentario::find($id);
    $comentario->delete();
}

/**
* Crea un objeto Comentario y lo almacena en la base de datos.
* @param String contenido;
* @param Integer temaid;
* @param Integer usuarioid;
*/
public function insertarComentario($cContenido, $cTemaID, $cUsuarioID)
{
    $nueva = new Comentario;
    $nueva->contenido = $cContenido;
    $nueva->temaid = $cTemaID;
    $nueva->usuarioid = $cUsuarioID;
    $nueva->fecha = date('Y-m-d H:i:s');
    $nueva->save();
}
}
