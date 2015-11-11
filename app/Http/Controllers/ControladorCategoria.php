<?php

namespace App\Http\Controllers;
use DB;
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
       $categorias = DB::table('categoria')
            ->join('tema', 'categoria.id', '=', 'tema.categoriaid')
            ->select('categoria.*', DB::raw('count(*) as cantidadtemas'))
            ->groupBy('categoria.id')
            ->paginate(5);
       $categorias->setPath('categorias');
       return view('VerCategorias')->with('categorias', $categorias);
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
    public function insertarCategoria($nombre,$imagen)
    {
        //
        $nueva = new Categoria;
        $nueva->categoria = $nombre;
        $nueva->ubicacionimagen=$imagen;
        $nueva->save();
    }
}
