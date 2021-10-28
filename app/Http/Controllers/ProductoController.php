<?php

namespace App\Http\Controllers;


use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Redirect;

class ProductoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::select('*')->get();
        return view('producto/crear_producto', ['categorias'=>$categorias]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        //dd($request);
        //Validacion

        $request->validate([
            'nombre' => 'required|string',
            'codigo' => ['regex:/(^[0-9A-Z_\-]+([0-9]$))/i | unique:producto.codigo'],
            'precio' => 'required|numeric',
            'categoria' => 'required|numeric',
            //'imagen' => 'required|integer|between:1,3',
        ]);
        //
        Producto::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'estado' => 1
        ]);

        //return $this->create();
        return Redirect::route('crear_producto')->with('alert', 'Un nuevo producto ha sido añadido con Éxito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //variable que trae la informacion actual del usuario 

            //vista para consultar un device [carpeta/nombre archivo]
            $productos = Producto::paginate(15);
            $categorias = Categoria::select('*')->get();

            $categoria_array = array();

            foreach($categorias as $categoria)
            {
                $categoria_array[$categoria->id] = $categoria->nombre;
            }
            //dd($productos);
            //dd($categorias);
            return view('producto/editar_producto') 
                ->with(compact('categoria_array'))
                ->with(compact('productos'));      
    }

    public function update(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => array('regex:/(^[0-9A-Z_\-]+([0-9]$))/i'),
            'precio' => 'required|numeric',
            'categoria' => 'required|numeric',
            //'imagen' => 'required|integer|between:1,3',
        ]);
        //->first();
        Producto::find($request->id)->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 

        return Redirect::back()->with('alert', 'Un producto ha sido actualizado con éxito');
    }

    public function display(Request $request)
    {
        //variable que trae la informacion actual del usuario 
        //dd($request->id);
            //vista para consultar un device [carpeta/nombre archivo]
            $categorias = Categoria::where('estado',1)->get();
            $producto = Producto::find($request->id);
            //dd($productos);
        return view('producto/editar_producto_id') 
                ->with(compact('categorias'))
                ->with(compact('producto'));      
    }

    public function patch(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => ['regex:/(^[0-9A-Z_\-]+([0-9]$))/i'],
            'precio' => 'required|numeric',
            'categoria' => 'required|numeric',
            //'imagen' => 'required|integer|between:1,3',
        ]);
        //->first();
        Producto::find($request->id)->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
        ]); 

        return Redirect::back()->with('alert', 'Un producto ha sido editado con éxito');
    }

       


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Producto::where('id',$request->id)->update(['estado' => 0 ]);

        return response()->json(['success'=> 'Un producto ha sido eliminada con éxito', 'value' => 1]);
  
    }
}