<?php

namespace App\Http\Controllers;
use App\Categoria as Categoria;
use App\Tema as Tema;
use App\Persona as pers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;;
use Illuminate\Database\Eloquent\Collection;

/**
 * ControladorInicio.php
 * @author panlopezv
 * @author modm12
 */
class ControladorInicio extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index()
    {
       $categorias = DB::table('categoria')
            ->leftJoin('tema', 'categoria.id', '=', 'tema.categoriaid')
            ->select('categoria.*', DB::raw('count(tema.categoriaid) as cantidadtemas'))
            ->groupBy('categoria.id')
            ->get();
    return view('Inicio')->with('categorias', $categorias);
    }
    
    public function store(Request $request)
    {


    }
}