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
      return view('PerfilPrincipal');
    }

    public function store(Request $request)
    {
      if ($request->var >0) {
        return redirect('busqueda/'.$request->busqueda);
      }else {
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



      return view('PerfilTemas');
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