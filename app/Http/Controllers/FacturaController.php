<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=Auth::user();

        if($usuario->isAdmin == 1){

            return view('Factura.listado', ['compra' => ""]);
        }

    }

    public function facturasPendientes()
    {
        $usuario=Auth::user();

        if($usuario->isAdmin == 1){

           $compra=DB::table("compra")->
           select(DB::raw('users.name, cliente_id, sum(monto_co) as scompra, sum(impuesto_co) as simpuesto' ))->
           leftjoin('users','users.id', '=', 'compra.cliente_id')
            ->where("facturado", 0)
            ->groupBy("cliente_id")
            ->get();

            return view('Factura.listado', ['compra' => $compra]);
        }
    }
    public function generar($id){
        $usuario=Auth::user();

        if($usuario->isAdmin == 1){
           $compra=DB::table("compra")->
           select(DB::raw('users.name, cliente_id, sum(monto_co) as scompra, sum(impuesto_co) as simpuesto' ))->
           leftjoin('users','users.id', '=', 'compra.cliente_id')
            ->where("facturado", 0)
            ->where("cliente_id", $id)
            ->groupBy("cliente_id")
            ->get();

            Compra::where('cliente_id', $id)->update(['facturado'=>'1']);

            $nume=Factura::orderBy('numero','desc')->take(1)->get();

            if($nume->isEmpty()==true){
                $numero=1;
            }else{
                $numero=$nume[0]->numero+1;
            }

            Factura::create([
                'numero' => $numero,
                'cliente_id' => $compra[0]->cliente_id,
                'monto_t' => $compra[0]->scompra,
                'impuesto_t' => $compra[0]->simpuesto
            ]);

            return redirect('factura/listado');
        }
    }

    public function listado(){

        $factura=Factura::with('obtenerCliente')->get();
        return view('Factura.listadoTotal', ["facturas"=>$factura]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
