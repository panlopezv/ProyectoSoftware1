<?php

namespace App\Http\Controllers;

use App\Usuario as Usuario;
use App\Persona as Persona;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Hash;

class ControladorUsuario extends Controller
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
        $con1 = $request->Input('contrasenia');
        $con2 = $request->Input('conContrasenia');

        $validator = Validator::make($request->all(), [
            'usuario'       => 'required|unique:usuario',
            'correo'        => 'required|unique:usuario',
            'contrasenia'   => 'required|max:16|min:8',
        ],[
            'required'  => 'Ingrese su :attribute.',
            'unique'    => 'ya existe el :attribute.',
            'min'       => 'La contraseña debe tener como minimo 8 caracteres.',
            'max'       => 'La contraseña debe tener como maximo 16 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator -> errors())
                        ->withInput($request->except('contrasenia'))
                        ->withInput($request->except('conContrasenia'));

        }
        else if ($con1!=$con2) {
            return redirect()->back()
                        ->withErrors('las contraseñas son diferentes')
                        ->withInput($request->except('contrasenia'))
                        ->withInput($request->except('conContrasenia'));
        }

        $nuevaPersona = new Persona;
        $nuevaPersona->nombres = "";
        $nuevaPersona->apellidos = "";
        $nuevaPersona->fechanacimiento = "";
        $nuevaPersona->ubicacionavatar = "";
        $nuevaPersona->sexo = "";
        $nuevaPersona->save();

        $usuario = new Usuario;
        $usuario->usuario = $request->input('usuario');
        $usuario->correo = $request->input('correo');
        $usuario->contrasenya = bcrypt($request->input('contrasenia'));
        $usuario->personaid = $nuevaPersona->id;
        $usuario->tipousuarioid = 3;
        $usuario->save();

        setcookie("id", $usuario->id);
        setcookie("usuario", $usuario->usuario);

        return redirect('/completarinformacion');
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
        $usuario = Usuario::find($id);
        $usuario->delete();
    }

    /**
     * Crea un objeto Usuario y lo almacena en la base de datos.
     * @param String usuario;
     * @param String correo;
     * @param String contrasenya;
     */
    public function insertarUsuario($uUsuario, $uCorreo, $uContrasenya)
    {
        //
        $nueva = new Usuario;
        $nueva->usuario = $uUsuario;
        $nueva->correo = $uCorreo;
        $nueva->contrasenya = $uContrasenya;
        $nueva->save();
    }

}
