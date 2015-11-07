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

class ControladorInicio extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index()
    {


       $categorias = Categoria::all();
       foreach ($categorias as $categoria) {
        }
    return view('Inicio')->with('categorias', $categorias);
}
    public function store(Request $request)
    {


    }





}