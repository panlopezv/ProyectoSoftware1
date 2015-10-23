<?php

namespace App\Http\Controllers;

use App\Comentario as Comentario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ControladorComentario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(),[
            'comentario'        => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            ControladorComentario::insertarComentario($request->input('comentario'), $request->input('temaid'), '1');
            return redirect('temas/'. $request->input('temaid'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        //
        $nueva = new Comentario;
        $nueva->contenido = $cContenido;
        $nueva->temaid = $cTemaID;
        $nueva->usuarioid = $cUsuarioID;
        $nueva->fecha = date('Y-m-d H:i:s');
        $nueva->save();
    }
}
