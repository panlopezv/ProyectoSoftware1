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

/**
 * ControladorBusqueda.php
 * @author modm12
 */
class ControladorBusqueda extends Controller
{
    /**
    * Show all of the users for the application.
    *
    * @return Response
    */
    public function index()
    {
        $temas = Tema::paginate(5);
        $temas->setPath('busqueda');
        return view('busqueda')->with('temas', $temas);
    }

    public function store(Request $request)
    {
        if ($request->var >0) {
            return redirect('busqueda/'.$request->busqueda);
        } else {
           // return redirect('nuevotema');
        }
    }

    public function buscar($b)
    {
        $temas = Tema::where('titulo', 'like', '%'.$b.'%')->paginate(5);
        $temas->setPath($b);
        return view('busqueda')->with('temas', $temas);
    }

    public function buscarCategoria($b)
    {        
        $categoria= Categoria::find($b);
        $temas = Tema::where('categoriaid',$b)->paginate(5);
        $temas->setPath($b);
        return view('BusquedaCategoria', compact('temas','categoria'));
    }
}