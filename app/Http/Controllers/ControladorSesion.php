<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Categoria as Categoria;
use App\Tema as Tema;
use DB;
use Hash;


class ControladorSesion extends Controller
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
        if (isset($_COOKIE['usuario'])){
            return ControladorSesion::cerrarSesion();
        }else{
            return ControladorSesion::inicioSesion($request);
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
    }

    public function inicioSesion(Request $request){
        $validador = Validator::make($request->all(), [
            'usuario'        => 'required|exists:usuario,usuario',
            'pass'           => 'required',
        ],[
            'required'  => 'ingrese su :attribute.',
            'exists'    => ':attribute incorrecto'
        ]);

        $usuario = DB::table('usuario')->where('usuario',$request->input('usuario'))->first();


        if ($validador->fails()) {
            return redirect('iniciofallido')
                        ->withErrors($validador -> errors())
                        ->withInput($request->all());

        }else if (Hash::check($request->input('pass'), $usuario->contrasenya)){
            setcookie("id", $usuario->id);
            setcookie("usuario", $usuario->usuario);
            return redirect("/");
        }else {
            return redirect('iniciofallido')
                        ->withErrors('Usuario o contraseña incorrecta')
                        ->withInput($request->all());
        }
    }

    
    public function cerrarSesion(){
        setcookie("id", "");
        setcookie("usuario", "");
        return redirect("/");
    }
}
