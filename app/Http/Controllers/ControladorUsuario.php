<?php

namespace App\Http\Controllers;

use App\Usuario as Usuario;
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
        $validador = Validator::make($request->all(), [
            'usuario'        => 'required|exists:usuario,usuario',
            'pass'           => 'required',
        ],[
            'required'  => 'necesitamos que ingrese su :attribute.',
            'exists'    => ':attribute incorrecto'
        ]);

        $usuario = DB::table('usuario')->where('usuario',$request->input('usuario'))->first();


        if ($validador->fails()) {
            return redirect('iniciofallido')
                        ->withErrors($validador -> errors())
                        ->withInput($request->all());

        }else if (Hash::check($request->input('pass'), $usuario->contrasenya)){
            /*session_start();
            $_SESSION['usuario'] = $usuario->usuario;*/
            setcookie("usuario", $usuario->usuario); 
            return redirect('/');
        }else {
            return redirect('iniciofallido')
                        ->withErrors('contraseña incorrecta')
                        ->withInput($request->all());
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
