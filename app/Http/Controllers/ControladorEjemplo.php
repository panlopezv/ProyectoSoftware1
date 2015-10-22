<?php

namespace App\Http\Controllers;

use App\Ejemplo as Ejemplo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ControladorEjemplo extends Controller
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
        $ejemplo = Ejemplo::find($id);
        $ejemplo->delete();
    }

    /**
     * Crea un objeto Ejemplo y lo almacena en la base de datos.
     * @param String eTitulo;
     * @param String eDescripcion;
     * @param String ubicacion;
     * @param Integer tID;
     */
    public function insertarEjemplo($eTitulo, $eDescripcion, $ubicacion, $tID)
    {
        //
        $nueva = new Ejemplo;
        $nueva->titulo = $eTitulo;
        $nueva->descripcion = $eDescripcion;
        $nueva->ubicacionarchivo = $ubicacion;
        $nueva->temaid = $tID;
        $nueva->save();
    }
}
