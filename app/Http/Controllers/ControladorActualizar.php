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
use Storage;

class ControladorActualizar extends Controller
{
    /**
     * obtiene los datos en variables, una tipo persona y otra tipo usuario del usuario que ha iniciado sesion
     *
     * @return vista informacionperfil con $usuario, $persona
     */
    public function index()
    {
        if(isset($_COOKIE['id'])){
        $usuario = DB::table('usuario')->where('id',$_COOKIE['id'])->first();
        $persona = DB::table('persona')->where('id',$usuario->personaid)->first();
        return view('InformacionPerfil', compact('usuario', 'persona'));
        }
        else{
            return view('InicioFallido');
        }
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
     * modifica un usuario y/o persona en la base de datos
     *
     * @param  parametros enviados del formulario en $request
     * @return vista perfil
     */
    public function store(Request $request)
    {
        $usuario = DB::table('usuario')->where('id',$_COOKIE['id'])->first();
        $persona = DB::table('persona')->where('id',$usuario->personaid)->first();
        $usuarioActualizado = Usuario::find($usuario->id);
        $personaActualizada = Persona::find($persona->id);

        if ($request->input('nombre') <> ''){
            $personaActualizada->nombres = $request->input('nombre');
        }if($request->input('apellido') <> ''){
            $personaActualizada->apellidos = $request->input('apellido');

        }if($request->input('usuario') <> ''){
            $validator = Validator::make($request->all(), [
                'usuario'       => 'unique:usuario',
            ],[
                'unique'    => 'ya existe el :attribute.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator -> errors())
                            ->withInput($request->except('contrasenia'))
                            ->withInput($request->except('conContrasenia'));
            }
            $usuarioActualizado->usuario = $request->input('usuario');            

        }if($request->input('contrasenia') <> ''){
            $con1 = $request->Input('contrasenia');
            $con2 = $request->Input('conContrasenia');
            $validator = Validator::make($request->all(), [
            'contrasenia'   => 'max:16|min:8',
            ],[
                'min'       => 'La contraseña debe tener como minimo 8 caracteres.',
                'max'       => 'La contraseña debe tener como maximo 16 caracteres.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator -> errors())
                            ->withInput($request->except('contrasenia'))
                            ->withInput($request->except('conContrasenia'));

            }
            if ($con1!=$con2) {
            return redirect()->back()
                        ->withErrors('las contraseñas son diferentes')
                        ->withInput($request->except('contrasenia'))
                        ->withInput($request->except('conContrasenia'));
            }
            $usuarioActualizado->contrasenya = bcrypt($request->input('contrasenia'));

        }if ($request->input('correo') <> ''){
            $validator = Validator::make($request->all(), [
                'correo'       => 'unique:usuario',
            ],[
                'unique'    => 'ya existe el :attribute.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator -> errors())
                            ->withInput($request->except('contrasenia'))
                            ->withInput($request->except('conContrasenia'));
            }
            $usuarioActualizado->correo = $request->input('correo'); 
        }if ($request->input('sexo') <> ''){
            $personaActualizada->sexo = $request->input('sexo');
        }if ($request->input('fechaNacimiento') <> ''){
            $personaActualizada->fechaNacimiento = $request->input('fechaNacimiento');
        }if ($request->input('palomita') == true){
            //Storage::delete('/public/imagenpersona/'.$persona->ubicacionavatar);
            $imageName = str_replace( " " , "-" , $usuario->usuario) . "_" . rand(11111,99999) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(base_path() . '/public/imagenpersona/', $imageName);
            $personaActualizada->ubicacionavatar = $imageName;
        }
        $personaActualizada->save();
        $usuarioActualizado->save();
        setcookie("id", $usuario->id);
        setcookie("usuario", $usuario->usuario);

        return redirect('/perfil');
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
}
