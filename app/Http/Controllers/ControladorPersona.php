<?php

namespace App\Http\Controllers;

use App\Persona as Persona;
use App\Usuario as Usuario;
use App\TipoUsuario as TipoUsuario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ControladorPersona extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas = Persona::all();
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
        $con1 = $request->Input('contrasenia');
        $con2 = $request->Input('conContrasenia');

        $validator = Validator::make($request->all(), [
            'nombre'        => 'required',
            'apellido'      => 'required',
            'usuario'       => 'required',
            'correo'        => 'required',
            'contrasenia'   => 'required',
            'sexo'          => 'required'
        ],[
            'required' => 'necesitamos que ingrese su :attribute.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator -> errors())
                        ->withInput($request->except('contrasenia'))
                        ->withInput($request->except('conContrasenia'));

        }else if ($con1!=$con2) {
            return redirect()->back()
                        ->withErrors('las contraseñas son diferentes')
                        ->withInput($request->except('contrasenia'))
                        ->withInput($request->except('conContrasenia'));

        }

        $nuevaPersona = new Persona;
        $nuevaPersona->nombres = $request->input('nombre');
        $nuevaPersona->apellidos = $request->input('apellido');
        $nuevaPersona->fechanacimiento = $request->input('fechaNacimiento');
        $nuevaPersona->ubicacionavatar = $request->input('avatar');
        $nuevaPersona->sexo = $request->input('sexo');
        $nuevaPersona->save();

        $usuario = new Usuario;
        $usuario->usuario = $request->input('usuario');
        $usuario->correo = $request->input('correo');
        $usuario->contrasenya = $request->input('contrasenia');
        $usuario->personaid = $nuevaPersona->id;
        $usuario->tipousuarioid = 3;
        $usuario->save();

        return redirect('inicio');
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
