<?php

namespace App\Http\Controllers;
use DB;
use App\Tema as Tema;
use App\Comentario as Comentario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ControladorTema extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTema)
    {
        $tema = Tema::find($idTema);
        $comentarios = DB::table('comentario')->where('temaid',$idTema)->get();
        //return view('tema')->with('tema', $tema);
        return view('tema', compact('tema', 'comentarios'));
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
            'titulo'        => 'required|unique:tema',
            'categoria'        => 'required',
            'contenido'        => 'required',
            'referencia'        => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'unique' => 'El campo :attribute ya existe en la base de datos.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            ControladorTema::insertarTema($request->input('titulo'), $request->input('contenido'), $request->input('referencia'), $request->input('categoria'), '1');
            $nuevoTemaID = DB::table('tema')->max('id');
            return redirect('temas/'.$nuevoTemaID);
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
        $tema = Tema::find($id);
        $tema->delete();
    }

    /**
     * Crea un objeto Tema y lo almacena en la base de datos.
     * @param String titulo;
     * @param String contenido;
     * @param String referencia;
     * @param Integer categoriaid;
     * @param Integer usuarioid;
     */
    public function insertarTema($tTitulo, $tContenido, $tReferencia, $cID, $uID)
    {
        //
        $nueva = new Tema;
        $nueva->titulo = $tTitulo;
        $nueva->contenido = $tContenido;
        $nueva->referencia = $tReferencia;
        $nueva->fechapublicacion = date('Y-m-d H:i:s');
        $nueva->categoriaid = $cID;
        $nueva->usuarioid = $uID;
        $nueva->save();
    }

}
