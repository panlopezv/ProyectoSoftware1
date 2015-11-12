<?php

namespace App\Http\Controllers;

use App\Persona as Persona;
use App\Usuario as Usuario;
use App\TipoUsuario as TipoUsuario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class ControladorPersona extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all()->where('nombres', 'mike');
        $personas=$personas::paginate(5);
        $personas->setPath('personas');
         return view('temas3')->with('personas', $personas);
    }
    public function index2($id)
    {
        //
        $persona = Persona::find($id);
        echo 'hola '.$persona->nombres;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre'        => 'required',
            'apellido'      => 'required',
            'sexo'          => 'required',
            'fechaNacimiento' => 'required'
        ],[
            'required' => 'Ingrese su :attribute.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator -> errors());

        }

    
        $imageName = str_replace( " " , "-" , $_COOKIE['usuario']) . "_" . rand(11111,99999) . '.' . $request->file('avatar')->getClientOriginalExtension();
        
        $request->file('avatar')->move(base_path() . '/public/imagenpersona/', $imageName);
        $usuario = DB::table('usuario')->where('id',$_COOKIE['id'])->first();
        $persona = Persona::find($usuario->personaid);
        $persona->nombres = $request->input('nombre');
        $persona->apellidos = $request->input('apellido');
        $persona->fechanacimiento = $request->input('fechaNacimiento');
        $persona->ubicacionavatar = $imageName;
        $persona->sexo = $request->input('sexo');
        $persona->save();

        return redirect('/');
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
        $persona = Persona::find($id);
        $persona->delete();
    }

    /**
     * Crea un objeto Persona y lo almacena en la base de datos.
     * @param String nombre;
     * @param String apellido;
     * @param Date fecha;
     * @param String ubicacion;
     * @param Boolean sexo;
     */
    public function insertarPersona($nombre, $apellido, $fecha, $ubicacion, $sexo)
    {
        //
        $nueva = new Persona;
        $nueva->nombres = $nombre;
        $nueva->apellidos = $apellido;
        $nueva->fechanacimiento = $fecha;
        $nueva->ubicacionavatar = $ubicacion;
        $nueva->sexo = $sexo;
        $nueva->save();
    }


}
