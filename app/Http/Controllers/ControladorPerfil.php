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
            return view('iniciofallido');
        }
    }

    public function store(Request $request)
    {
      if ($request->var >0) {
        return redirect('busqueda/'.$request->busqueda);
      } else {
        return redirect('nuevotema');
      }
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function mostrarEscritores()
    {
        $usuarios = DB::table('persona')
            ->join('usuario', 'usuario.personaid', '=', 'persona.id')
            ->join('tipousuario', 'tipousuario.id', '=', 'usuario.tipousuarioid')
            ->select('persona.*', 'tipousuario.tipo')
            ->get();
      return view('PerfilEscritores',  compact('usuarios'));
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function mostrarTemas()
    {
        $temas = DB::table('tema')
            ->join('usuario', 'tema.usuarioid', '=', 'usuario.id')
            ->leftJoin('comentario', 'tema.id', '=', 'comentario.temaid')
            ->select('tema.*', 'usuario.usuario', DB::raw('count(comentario.temaid) as cantidadcomentarios'))
            ->groupBy('tema.id')
            ->get();
        return view('PerfilTemas', compact('temas'));
    }

    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function nuevoTema()
    {

      $categorias = Categoria::all()->lists('categoria','id');
      $categorias[''] = 'Categoria del tema';
      return view('PerfilNuevoTema')->with('categorias', $categorias);

    }
    
    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function nuevaCategoria()
    {
      return view('PerfilNuevaCategoria');
    }
}