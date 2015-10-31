<?php

namespace App\Http\Controllers;
use App\Tema as Tema;
use App\Persona as pers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;;
use Illuminate\Database\Eloquent\Collection;

class ControladorBusqueda extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index()
    {
           

           $temas = Tema::where('titulo', 'like', '%o%')->paginate(15);
           $temas->setPath('busqueda');
         return view('busqueda')->with('temas', $temas);
    }
    public function store(Request $request)
    {
            if ($request->var >0) {
                return redirect('busqueda/'.$request->busqueda);
                # code...
            }else {
                # code...
                return redirect('nuevotema');
            }
            
  
    }
    public function buscar($b)
    {
             $temas = Tema::where('titulo', 'like', '%'.$b.'%')->paginate(15);
           $temas->setPath('busqueda');
         return view('busqueda')->with('temas', $temas);
  
    }




}