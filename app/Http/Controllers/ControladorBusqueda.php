<?php

namespace App\Http\Controllers;
use App\Tema as Tema;
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
           

           $temas = Tema::paginate(15);
         return view('busqueda')->with('temas', $temas);
    }
    public function store(Request $request)
    {
            return redirect('nuevotema');
  
    }




}