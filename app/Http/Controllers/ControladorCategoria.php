<?php

namespace App\Http\Controllers;

use App\Categoria as Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ControladorCategoria extends Controller
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
        $categoria = Categoria::find($id);
        $categoria->delete();
    }

    /**
     * Crea un objeto Categoria y lo almacena en la base de datos.
     * @param String nombre;
     */
    public function insertarCategoria($nombre)
    {
        //
        $nueva = new Categoria;
        $nueva->categoria = $nombre;
        $nueva->save();
    }

    public function getCategorias()
    {
        $categorias = Categoria::all()->lists('categoria','id');
        $categorias[''] = 'Categoria del tema';
        return view('crear')->with('categorias', $categorias);
    }
    public function getCategorias2()
    {
        $categorias = Categoria::all();
         return view('crear2');
    }
}
