<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=Auth::user();
        $producto=Producto::with('obtenerImpuesto')
        ->get();
        return view('Compra.compra', ['producto'=>$producto, 'admin'=>$usuario->isAdmin]);
    }

    public function detalle($id){
       $compra=Compra::where('cliente_id', $id)
       ->with('obtenerProducto')
       ->get();
       return view('Compra.compraDetalle', ['compra' => $compra]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'producto'=>'required'
        ]);

        $producto=Producto::with('obtenerImpuesto')->
        where('id',$request->get('producto'))->get();

        $fecha=Carbon::now();
        $fechaActual= $fecha->format('Y-m-d H:i:s');
        $usuario=Auth::user();
        $imp=$producto[0]->precio * ($producto[0]->obtenerImpuesto->valor/100);

        $compra=Compra::create([
            "cliente_id" => $usuario->id,
            "producto_id" => $request->get('producto'),
            "fecha" => $fechaActual,
            "facturado" => "0",
            "impuesto_co" => $imp,
            "monto_co" => $producto[0]->precio
        ]);

        $comprafin=Compra::where('id', $compra->id)
        ->with('obtenerCliente','obtenerProducto.obtenerImpuesto')
        ->get();

        return view("Compra.compraFin", ['datosCompra' => $comprafin]);

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
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
