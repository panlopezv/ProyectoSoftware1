<?php

namespace App\Http\Controllers;

use App\TipoUsuario as TipoUsuario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * ControladorTipoUsuario.php - Clase que sirve para obtener y enviar informacion de la entidad TipoUsuario a la base de datos.
 * @author panlopezv
 */
class ControladorTipoUsuario extends Controller
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
        //
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
        $tUsuario = TipoUsuario::find($id);
        $tUsuario->delete();
    }

    /**
     * Crea un objeto TipoUsuario y lo almacena en la base de datos.
     * @param String tipo;
     */
    public function insertarTipoUsuario($tTipo)
    {
        //
        $nueva = new TipoUsuario;
        $nueva->tipo = $tTipo;
        $nueva->save();
    }

}
