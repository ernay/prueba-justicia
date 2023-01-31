<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $usuario=Auth::user();
        if($usuario->isAdmin == 1){
            $producto=Producto::with('obtenerImpuesto')
            ->get();
            return view('Producto.listado', ['producto'=>$producto]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $usuario=Auth::user();
        if($usuario->isAdmin == 1){
            $impuesto=Impuesto::all();
            return view("Producto.crear", ['impuesto' => $impuesto]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required'
        ]);

        Producto::create([
            "nombre" => $request->get("nombre"),
            "precio" => $request->get("precio"),
            "impuesto_id" => $request->get("impuesto")
        ]);

        return redirect('/producto')->with('notice', 'El producto fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $usuario=Auth::user();
        if($usuario->isAdmin == 1){
            $producto= Producto::findOrFail($id);
            $impuesto=Impuesto::all();
            return view("Producto.editar", ['producto'=>$producto, 'impuesto' => $impuesto]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required'
        ]);
        $producto= Producto::findOrFail($id);
        $producto->nombre= $request->get('nombre');
        $producto->precio= $request->get('precio');
        $producto->save();

        return redirect('/producto')->with('notice', 'El producto fue eliminado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect('/producto')->with('notice', $producto->nombre.' fue eliminado');
    }
}
