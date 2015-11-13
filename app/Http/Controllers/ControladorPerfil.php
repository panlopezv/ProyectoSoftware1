<?php

namespace App\Http\Controllers;
use App\Tema as Tema;
use App\Persona as persona;
use App\Categoria as categoria;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;;
use Illuminate\Database\Eloquent\Collection;

class ControladorPerfil extends Controller
{
    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function index()
    {
        if (isset($_COOKIE['id'])){
            $persona = DB::table('persona')
                ->join('usuario', 'persona.id', '=', 'usuario.personaid')
                ->where('usuario.id', $_COOKIE['id'])
                ->first();
            $temas = DB::table('tema')
                ->leftJoin('comentario', 'tema.id', '=', 'comentario.temaid')
                ->select('tema.*', DB::raw('count(comentario.temaid) as cantidadcomentarios'))
                ->groupBy('tema.id')
                ->where('tema.usuarioid', $_COOKIE['id'])
                ->get();
            return view('PerfilPrincipal', compact('persona', 'temas'));
        }
        else{
            return view('InicioFallido');
        }
    }

    public function store(Request $request)
    {
      if ($request->var >0) {
        return redirect('busqueda/'.$request->busqueda);
      } else {
        //return redirect('nuevotema');
      }
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function mostrarEscritores()
    {
        if(isset($_COOKIE['id'])){
            if(isset($tipousuario)){
                if($tipousuario=="Administrador"){
                $usuarios = DB::table('persona')
                    ->join('usuario', 'usuario.personaid', '=', 'persona.id')
                    ->join('tipousuario', 'tipousuario.id', '=', 'usuario.tipousuarioid')
                    ->select('persona.*', 'tipousuario.tipo')
                    ->get();
                return view('PerfilEscritores',  compact('usuarios'));
                }
                else {
                    return view('/errors/401');
                }
            }
            else {
                $tusuario = DB::table('tipousuario')
                    ->join('usuario', 'usuario.tipousuarioid', '=', 'tipousuario.id')
                    ->select('tipousuario.tipo')
                    ->where('usuario.id', $_COOKIE['id'])
                    ->first();
                    $tipousuario=$tusuario->tipo;
                    if($tipousuario=="Administrador"){
                    $usuarios = DB::table('persona')
                        ->join('usuario', 'usuario.personaid', '=', 'persona.id')
                        ->join('tipousuario', 'tipousuario.id', '=', 'usuario.tipousuarioid')
                        ->select('persona.*', 'tipousuario.tipo')
                        ->get();
                    return view('PerfilEscritores',  compact('usuarios'));
                    }
                    else {
                        return view('/errors/401');
                    }
            }
        }else{
            return view('InicioFallido');
        }
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function mostrarTemas()
    {
        if(isset($_COOKIE['id'])){
            if(isset($tipousuario)){
                if($tipousuario=="Administrador"){
                    $temas = DB::table('tema')
                        ->join('usuario', 'tema.usuarioid', '=', 'usuario.id')
                        ->leftJoin('comentario', 'tema.id', '=', 'comentario.temaid')
                        ->select('tema.*', 'usuario.usuario', DB::raw('count(comentario.temaid) as cantidadcomentarios'))
                        ->groupBy('tema.id')
                        ->get();
                    return view('PerfilTemas', compact('temas'));
                }
                else {
                    return view('/errors/401');
                }
            }
            else {
                $tusuario = DB::table('tipousuario')
                    ->join('usuario', 'usuario.tipousuarioid', '=', 'tipousuario.id')
                    ->select('tipousuario.tipo')
                    ->where('usuario.id', $_COOKIE['id'])
                    ->first();
                    $tipousuario=$tusuario->tipo;
                if($tipousuario=="Administrador"){
                    $temas = DB::table('tema')
                        ->join('usuario', 'tema.usuarioid', '=', 'usuario.id')
                        ->leftJoin('comentario', 'tema.id', '=', 'comentario.temaid')
                        ->select('tema.*', 'usuario.usuario', DB::raw('count(comentario.temaid) as cantidadcomentarios'))
                        ->groupBy('tema.id')
                        ->get();
                    return view('PerfilTemas', compact('temas'));
                }
                else {
                    return view('/errors/401');
                }
            }
        }else{
            return view('InicioFallido');
        }
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function nuevoTema()
    {
        if(isset($_COOKIE['id'])){
            if(isset($tipousuario)){
                if($tipousuario=="Administrador"||$tipousuario=="Escritor"){
                      $categorias = Categoria::all()->lists('categoria','id');
                      $categorias[''] = 'Categoria del tema';
                      return view('PerfilNuevoTema')->with('categorias', $categorias);
                }            
                else {
                    return view('/errors/401');
                }
            }
            else{
                $tusuario = DB::table('tipousuario')
                    ->join('usuario', 'usuario.tipousuarioid', '=', 'tipousuario.id')
                    ->select('tipousuario.tipo')
                    ->where('usuario.id', $_COOKIE['id'])
                    ->first();
                    $tipousuario=$tusuario->tipo;
                if($tipousuario=="Administrador"||$tipousuario=="Escritor"){
                      $categorias = Categoria::all()->lists('categoria','id');
                      $categorias[''] = 'Categoria del tema';
                      return view('PerfilNuevoTema')->with('categorias', $categorias);
                }            
                else {
                    return view('/errors/401');
                }

            }
        }else{
            return view('InicioFallido');
        }
    }
    
    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function nuevaCategoria()
    {
        if(isset($_COOKIE['id'])){
            if(isset($tipousuario)){
                if($tipousuario=="Administrador"||$tipousuario=="Escritor"){
                    return view('PerfilNuevaCategoria');
                }
                else{
                    return view('/errors/401');
                }
            }
            else{
                $tusuario = DB::table('tipousuario')
                    ->join('usuario', 'usuario.tipousuarioid', '=', 'tipousuario.id')
                    ->select('tipousuario.tipo')
                    ->where('usuario.id', $_COOKIE['id'])
                    ->first();
                    $tipousuario=$tusuario->tipo;
                    if($tipousuario=="Administrador"||$tipousuario=="Escritor"){
                        return view('PerfilNuevaCategoria');
                    }
                    else{
                        return view('/errors/401');
                    }
            }
        }else{
            return view('InicioFallido');
        }
    }
}