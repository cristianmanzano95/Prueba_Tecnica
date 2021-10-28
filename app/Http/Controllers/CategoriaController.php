<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

use Redirect;


class CategoriaController extends Controller
{
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
        //
        //$categorias = Categoria::select('*')->get();
        return view('categoria/crear_categoria');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
        ]);
        //
        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        //return $this->create();
        return Redirect::route('crear_categoria')->with('alert', 'Nueva categoria ha sido añadida con Éxito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $categorias = Categoria::paginate(10);

            return view('categoria/editar_categoria') 
                ->with(compact('categorias'));  
    }

    public function update(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string',
            //'imagen' => 'required|integer|between:1,3',
        ]);
        //->first();
        Categoria::find($request->id)->update([
            'nombre' => $request->nombre,
        ]); 

        return Redirect::back()->with('alert', 'Una categoria ha sido actualizado con éxito');
    }

    public function display(Request $request)
    {
        //variable que trae la informacion actual del usuario 
        //dd($request->id);
            //vista para consultar un device [carpeta/nombre archivo]
            $categoria = Categoria::find($request->id);
            //dd($productos);
        return view('categoria/editar_categoria_id') 
                ->with(compact('categoria'));      
    }


    public function destroy(Request $request)
    {
        //
        Categoria::where('id',$request->id)->update(['estado' => 0 ]);
        return Redirect::back()->with('alert', 'Una categoria ha sido eliminada con éxito');
        //return response()->json(['success'=> '', 'value' => 1]);
  
    }

}

      
