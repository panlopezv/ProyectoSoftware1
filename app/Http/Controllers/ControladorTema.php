<?php

namespace App\Http\Controllers;
use DB;
use App\Tema as Tema;
use App\Categoria as Categoria;
use App\Comentario as Comentario;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * ControladorTema.php - Clase que sirve para obtener y enviar informacion de la entidad Tema a la base de datos.
 * @author panlopezv
 */
class ControladorTema extends Controller
{
    /**
     * Obtiene un tema en especifico y los comentarios, ejemplos y categoria que posee.
     * @param int idTema
     * @return vista VerTema con $tema, $comentarios, $ejemplos.
     */
    public function index($idTema)
    {
        $tema = DB::table('tema')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('tema.*', 'categoria.categoria')
            ->where('tema.id',$idTema)
            ->first();

        $comentarios = DB::table('comentario')
            ->join('usuario', 'usuario.id', '=', 'comentario.usuarioid')
            ->join('persona', 'persona.id', '=', 'usuario.personaid')
            ->select('comentario.*', 'usuario.usuario', 'persona.ubicacionavatar')
            ->where('temaid',$idTema)
            ->get();
        $ejemplos = DB::table('ejemplo')->where('temaid',$idTema)->get();
        return view('VerTema', compact('tema', 'comentarios', 'ejemplos'));
    }

    /**
     * Muestra el formulario para crear un tema.
     * @return vista CrearTema
     */
    public function nuevoTema(){
        $categorias = Categoria::all()->lists('categoria','id');
        $categorias[''] = 'Categoria del tema';
        return view('CrearTema')->with('categorias', $categorias);
    }

    /**
     * Guarda nuevo tema en la base de datos.
     * @param  Datos del nuevo tema a crear. $request
     * @return Si los datos son validos guarda el tema y redirige a la vista del tema, sino redirige a la vista anterior con los errores correspondientes.
     */
    public function store(Request $request)
    {

        if ($request->input('accion')=='crear'){
            $validador = Validator::make($request->all(),[
                'titulo'        => 'required|unique:tema',
                'categoria'        => 'required',
                'contenido'        => 'required',
                'referencia'        => 'required',
            ],[
                'required' => 'El campo :attribute es obligatorio.',
                'unique' => 'El campo :attribute ya existe en la base de datos.',
            ]);

            if ($validador->fails()) {
                return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
            }
            else {
                ControladorTema::insertarTema($request->input('titulo'), $request->input('contenido'), $request->input('referencia'), $request->input('categoria'), $_COOKIE['id']);
                $nuevoTemaID = DB::table('tema')->max('id');
                return redirect('temas/'.$nuevoTemaID);
            }
        }
        else if ($request->input('accion')=='modificar'){
            if($request->input('tAnterior')==$request->input('titulo')){
                    $validador = Validator::make($request->all(),[
                    'titulo'        => 'required',
                    'categoria'        => 'required',
                    'contenido'        => 'required',
                    'referencia'        => 'required',
                ],[
                    'required' => 'El campo :attribute es obligatorio.',
                    'unique' => 'El campo :attribute ya existe en la base de datos.',
                ]);
            }
            else{
                    $validador = Validator::make($request->all(),[
                    'titulo'        => 'required|unique:tema',
                    'categoria'        => 'required',
                    'contenido'        => 'required',
                    'referencia'        => 'required',
                ],[
                    'required' => 'El campo :attribute es obligatorio.',
                    'unique' => 'El campo :attribute ya existe en la base de datos.',
                ]);
            }

            if ($validador->fails()) {
                return redirect()->back()->withErrors($validador -> errors())->withInput($request->all());
            }
            else {
                //ControladorTema::insertarTema($request->input('titulo'), $request->input('contenido'), $request->input('referencia'), $request->input('categoria'), '1');
                $tema = Tema::find($request->input('id'));
                $tema->titulo=$request->input('titulo');
                $tema->contenido=$request->input('contenido');
                $tema->referencia=$request->input('referencia');
                $tema->categoriaid=$request->input('categoria');
                $tema->save();
                return redirect('temas/'.$request->input('id'));
            }
        }
    }

    /**
     * Muestra la vista para modificar un tema en especifico.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = DB::table('tema')
            ->join('categoria', 'categoria.id', '=', 'tema.categoriaid')
            ->select('tema.*', 'categoria.categoria')
            ->where('tema.id',$id)
            ->first();
        //return view('ModificarTema')->with('tema', $tema);
        $categorias = Categoria::all()->lists('categoria','id');
        $categorias[''] = 'Categoria del tema';
        return view('ModificarTema', compact('tema', 'categorias'));
    }

    /**
     * Elimina un tema en especifico de la base de datos.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = Tema::find($id);
        $tema->delete();
    }

    /**
     * Crea un objeto Tema y lo almacena en la base de datos.
     * @param String titulo;
     * @param String contenido;
     * @param String referencia;
     * @param Integer categoriaid;
     * @param Integer usuarioid;
     */
    public function insertarTema($tTitulo, $tContenido, $tReferencia, $cID, $uID)
    {
        $nueva = new Tema;
        $nueva->titulo = $tTitulo;
        $nueva->contenido = $tContenido;
        $nueva->referencia = $tReferencia;
        $nueva->fechapublicacion = date('Y-m-d H:i:s');
        $nueva->categoriaid = $cID;
        $nueva->usuarioid = $uID;
        $nueva->save();
    }
}
