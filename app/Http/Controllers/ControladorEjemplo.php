<?php

namespace App\Http\Controllers;
use DB;
use App\Ejemplo as Ejemplo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ControladorEjemplo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idEjemplo)
    {
        $ejemplo = DB::table('ejemplo')
            ->join('tema', 'tema.id', '=', 'ejemplo.temaid')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('ejemplo.*', 'tema.id as temaid', 'tema.titulo', 'categoria.id as categoriaid', 'categoria.categoria')
            ->where('ejemplo.id',$idEjemplo)
            ->first();
        return view('VerEjemplo', compact('ejemplo'));
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
            'titulo'        => 'required',
            'descripcion'        => 'required',
            'archivo'        => 'required|mimes:txt',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'El archivo debe tener extension .txt.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            $imageName = str_replace( " " , "-" , $request->input('titulo')) . "_" . rand(11111,99999) . '.' . $request->file('archivo')->getClientOriginalExtension();
            ControladorEjemplo::insertarEjemplo($request->input('titulo'), $request->input('descripcion'), $imageName, $request->input('temaid'));
            $request->file('archivo')->move(base_path() . '/public/ejemplostema/', $imageName);
            return redirect('temas/'.$request->input('temaid'))->with('message', '¡Ejemplo añadido!'); ;
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

    public function nuevoEjemplo($temaid){
        $tema = DB::table('tema')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('tema.id as temaid', 'tema.titulo', 'categoria.id as categoriaid', 'categoria.categoria')
            ->where('tema.id',$temaid)
            ->first();
        return view('CrearEjemplo', compact('tema'));
    }
}
