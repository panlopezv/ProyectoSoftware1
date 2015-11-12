<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ControladorActualizar extends Controller
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


        $usuario = DB::table('usuario')->where('id',$_COOKIES['id'])->first();
        $persona = DB::table('persona')->where('persona',$usuario->personaid)->first();
        $usuarioActualizado = Usuario::find($usuario->id);
        $personaActualizada = Persona::find($persona->id);

        if ($request->input('nombre' <> '')){
            $usuarioActualizado->apellido = $request->input('apellido'));
        }else if($request->input('apellido' <> '')){
            $personaActualizada->nombre = $request->input('nombre'));

        }else if($request->input('usuario' <> '')){
            $validator = Validator::make($request->input('usuario'), [
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
            $usuarioActualizado->usuario = $request->input('usuario'));            

        }

        }else if ($request->input('contrasenia' <> '')){
            $con1 = $request->Input('contrasenia');
            $con2 = $request->Input('conContrasenia');
            $validator = Validator::make($request->input('contrasenia'), [
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
        }

        }else if ($request->input('correo' <> '')){
            $validator = Validator::make($request->input('correo'), [
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
            $usuarioActualizado->correo = $request->input('correo')); 
        }else if ($request->input('sexo' <> '')){
            $personaActualizada->sexo = $request->input('sexo'));
        }else if ($request->input('fechaNacimiento' <> '')){
            $personaActualizada->fechaNacimiento = $request->input('fechaNacimiento'));
        }else if ($request->input('avatar' <> '')){
            unlink('/public/ejemplotema/'. $persona->ubicacionavatar);
            $imageName = str_replace( " " , "-" , $usuarioActualizado->usuario) . "_" . rand(11111,99999) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(base_path() . '/public/imagenpersona/', $imageName);
            $personaActualizada->ubicacionavatar = $imageName;
        }
        $personaActualizada->save();
        $usuarioActualizado->save();
        setcookie("id", $usuario->id);
        setcookie("usuario", $usuario->usuario);

        return redirect('/CompletarInformacion');
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
