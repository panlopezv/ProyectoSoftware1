<?php

namespace App\Http\Controllers;
use DB;
use App\Ejemplo as Ejemplo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * ControladorEjemplo.php - Clase que sirve para obtener y enviar informacion de la entidad Ejemplo a la base de datos.
 * @author panlopezv
 */
class ControladorEjemplo extends Controller
{
    /**
     * Obtiene un ejemplo en especifico y el tema, categoria al que pertenece.
     * @param int idEjemplo
     * @return vista VerEjemplo con $ejemplo.
     */
    public function index($idEjemplo)
    {
        $ejemplo = DB::table('ejemplo')
            ->join('tema', 'tema.id', '=', 'ejemplo.temaid')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('ejemplo.*', 'tema.id as temaid', 'tema.titulo', 'categoria.id as categoriaid', 'categoria.categoria')
            ->where('ejemplo.id',$idEjemplo)
            ->first();
        return view('VerEjemplo', compact('ejemplo'));
    }

    /**
     * Muestra el formulario para crear un ejemplo del tema con el identificador recibido.
     * @param int temaid
     * @return vista CrearCategoria
     */
    public function nuevoEjemplo($temaid){
        $tema = DB::table('tema')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('tema.id as temaid', 'tema.titulo', 'categoria.id as categoriaid', 'categoria.categoria')
            ->where('tema.id',$temaid)
            ->first();
        return view('CrearEjemplo', compact('tema'));
    }

    /**
     * Guarda nuevo ejemplo en la base de datos.
     * @param  Datos del nuevo ejemplo a crear. $request
     * @return Si los datos son validos guarda el ejemplo y redirige a la vista del tema, sino redirige a la vista anterior con los errores correspondientes.
     */
    public function store(Request $request)
    {
    if(isset($_COOKIE['id'])){

        $validador = Validator::make($request->all(),[
            'titulo'        => 'required',
            'descripcion'        => 'required',
            'archivo'        => 'required|mimes:txt',
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'mimes' => 'El archivo debe tener extension .txt.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
        }
        else {
            $imageName = str_replace( " " , "-" , $request->input('titulo')) . "_" . rand(11111,99999) . '.' . $request->file('archivo')->getClientOriginalExtension();
            ControladorEjemplo::insertarEjemplo($request->input('titulo'), $request->input('descripcion'), $imageName, $request->input('temaid'));
            $request->file('archivo')->move(base_path() . '/public/ejemplotema/', $imageName);
            return redirect('temas/'.$request->input('temaid'))->with('message', '¡Ejemplo añadido!'); ;
        } 
    }
    else{
        return redirect('/iniciofallido'); 
    }
    }

    /**
     * Elimina un ejemplo en especifico de la base de datos.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplo = Ejemplo::find($id);
        $ejemplo->delete();
    }

    /**
     * Crea un objeto Ejemplo y lo almacena en la base de datos.
     * @param String eTitulo;
     * @param String eDescripcion;
     * @param String ubicacion;
     * @param Integer tID;
     */
    public function insertarEjemplo($eTitulo, $eDescripcion, $ubicacion, $tID)
    {
        $nueva = new Ejemplo;
        $nueva->titulo = $eTitulo;
        $nueva->descripcion = $eDescripcion;
        $nueva->ubicacionarchivo = $ubicacion;
        $nueva->temaid = $tID;
        $nueva->save();
    }
}
