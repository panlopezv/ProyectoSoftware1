<?php

namespace App\Http\Controllers;
use DB;
use App\Categoria as Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * ControladorCategoria.php - Clase que sirve para obtener y enviar informacion de la entidad Categoria a la base de datos.
 * @author panlopezv
 */
class ControladorCategoria extends Controller
{
    /**
     * Obtiene todas las categorias y la cantidad de temas de cada una.
     * @return vista VerCategoria con $categorias.
     */
    public function index()
    {
       $categorias = DB::table('categoria')
            ->leftJoin('tema', 'categoria.id', '=', 'tema.categoriaid')
            ->select('categoria.*', DB::raw('count(tema.categoriaid) as cantidadtemas'))
            ->groupBy('categoria.id')
            ->paginate(5);  //Mostrar 5 resultados a la vez.
       $categorias->setPath('categorias');
       return view('VerCategorias')->with('categorias', $categorias);
    }

    /**
     * Muestra el formulario para crear una categoria
     * @return vista CrearCategoria
     */
    public function nuevaCategoria(){
        return view('CrearCategoria');
    }

    /**
     * Guarda una categoria en la base de datos.
     * @param  Datos de la nueva categoria a crear. $request
     * @return Si los datos son validos guarda la categoria y redirige a la vista categorias, sino redirige a la vista anterior con los errores correspondientes.
     */
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(),[
            'categoria'        => 'required|unique:categoria',
            'imagen'        => 'required|mimes:jpg,jpeg,bmp,png',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'La imagen debe tener extension: .jpg, .jpeg, .bmp o .png.',
            'unique' => 'El campo :attribute ya existe en la base de datos.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            $imageName = str_replace( " " , "-" , $request->input('categoria'))  . "_" . rand(11111,99999) . '.' . $request->file('imagen')->getClientOriginalExtension();  // El nombre de la imagen se sustituye por el nombre de la categoria + un numero aleatorio entre 11111 y 99999.
            ControladorCategoria::insertarCategoria($request->input('categoria'), $imageName);
            $request->file('imagen')->move(base_path() . '/public/imagencategoria/', $imageName);   //Se copia la imagen seleccionada a la carpeta imagencatgoria en el servidor.
            return redirect('categorias');
        } 
    }

    /**
     * Elimina una categoria en especifico de la base de datos.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
    }

    /**
     * Crea un objeto Categoria y lo almacena en la base de datos.
     * @param String nombre;
     * @param String imagen;
     */
    public function insertarCategoria($nombre, $imagen)
    {
        $nueva = new Categoria;
        $nueva->categoria = $nombre;
        $nueva->ubicacionimagen=$imagen;
        $nueva->save();
    }
}
