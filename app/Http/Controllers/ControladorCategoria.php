<?php

namespace App\Http\Controllers;
use DB;
use App\Categoria as Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
            ->leftJoin('tema', 'categoria.id', '=', 'tema.categoriaid')
            ->select('categoria.*', DB::raw('count(tema.categoriaid) as cantidadtemas'))
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
        $validador = Validator::make($request->all(),[
            'categoria'        => 'required|unique:categoria',
            'imagen'        => 'required|mimes:jpg,jpeg,bmp,png',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'La imagen debe tener extension: .jpg, .jpeg, .bmp o .png.',
            'unique' => 'El campo :attribute ya existe en la base de datos.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            $imageName = str_replace( " " , "-" , $request->input('categoria'))  . "_" . rand(11111,99999) . '.' . $request->file('imagen')->getClientOriginalExtension();
            ControladorCategoria::insertarCategoria($request->input('categoria'), $imageName);
            $request->file('imagen')->move(base_path() . '/public/imagencategoria/', $imageName);
            return redirect('categorias');
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
        $categoria = Categoria::find($id);
        $categoria->delete();
    }

    /**
     * Crea un objeto Categoria y lo almacena en la base de datos.
     * @param String nombre;
     */
    public function insertarCategoria($nombre, $imagen)
    {
        $nueva = new Categoria;
        $nueva->categoria = $nombre;
        $nueva->ubicacionimagen=$imagen;
        $nueva->save();
    }

    public function nuevaCategoria(){
        return view('CrearCategoria');
    }
}
