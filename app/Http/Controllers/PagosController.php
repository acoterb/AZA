<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cobradore;
use App\Models\Contratos;
use App\Models\Grua;
use App\Models\Pagos_detalle;
use App\Models\Pagos_fecha;
use App\Models\Vendedore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Pagos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pagos.index');
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

        $pagosDetalle1 = new Pagos_detalle();
        $pagosDetalle1->pago_id = $request->polizaID;
        $pagosDetalle1->num_pago = $request->pagosRealizados + 1;
        $pagosDetalle1->fecha_pago = $request->fecha_pago;
        $pagosDetalle1->cantidad = $request->pago;
        $pagosDetalle1->concepto = $request->concepto;
        $pagosDetalle1->forma_pago = $request->formaPago;
        $pagosDetalle1->usuario_creo = Auth::user()->id;
        $pagosDetalle1->save();

        $pago = Pagos::where('contrato_id', $request->polizaID)->first();
        $pago ->pagosrealizados = count(Pagos_detalle::where('pago_id',$pago->id)->get());
        return redirect('pagos');
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

    public function buscado(Request $request)
    {

        $poliza = DB::table('contratos')->where('contratos.poliza', 'LIKE', '%'.$request->poliza.'%')->first();
        $id = $poliza->id;
        $cliente = Contratos::findorfail($id);
        $clientes = Cliente::findorfail($cliente->cliente_id);
        $pagos = Pagos::where('contrato_id',$cliente->id)->first();
        $pagosDetalle1 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','1')->first();
        $pagosDetalle2 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','2')->first();
        $pagosDetalle3 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','3')->first();
        $pagosDetalle4 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','4')->first();
        $pagosDetalle5 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','5')->first();
        $pagosDetalle6 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','6')->first();
        $pagosDetalle7 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','7')->first();
        $pagosDetalle8 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','8')->first();
        $pagosDetalle9 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','9')->first();
        $pagosDetalle10 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','10')->first();
        $pagosDetalle11 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','11')->first();
        $pagosDetalle12 = Pagos_detalle::where('pago_id',$pagos->id)->where('num_pago','12')->first();

        $cantidadPagada = 0 ;
        $pagosRealizados = 0;

        if ($pagosDetalle1){
            $cantidadPagada += $pagosDetalle1->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle2){
            $cantidadPagada += $pagosDetalle2->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle3){
            $cantidadPagada += $pagosDetalle3->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle4){
            $cantidadPagada += $pagosDetalle4->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle5){
            $cantidadPagada += $pagosDetalle5->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle6){
            $cantidadPagada += $pagosDetalle6->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle7){
            $cantidadPagada += $pagosDetalle7->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle8){
            $cantidadPagada += $pagosDetalle8->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle9){
            $cantidadPagada += $pagosDetalle9->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle10){
            $cantidadPagada += $pagosDetalle10->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle11){
            $cantidadPagada += $pagosDetalle11->cantidad;
            $pagosRealizados += 1;
        }
        if ($pagosDetalle12){
            $cantidadPagada += $pagosDetalle12->cantidad;
            $pagosRealizados += 1;
        }

        $pagosFecha1 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','1')->first();
        $pagosFecha2 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','2')->first();
        $pagosFecha3 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','3')->first();
        $pagosFecha4 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','4')->first();
        $pagosFecha5 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','5')->first();
        $pagosFecha6 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','6')->first();
        $pagosFecha7 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','7')->first();
        $pagosFecha8 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','8')->first();
        $pagosFecha9 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','9')->first();
        $pagosFecha10 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','10')->first();
        $pagosFecha11 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','11')->first();
        $pagosFecha12 = Pagos_fecha::where('contrato_id',$cliente->id)->where('num_pago','12')->first();
        $vendedor = new Vendedore();
        $vendedor = $vendedor->all();
        $cobrador = new Cobradore();
        $cobrador = $cobrador->all();


        return view('pagos.edit',compact('vendedor','cobrador','cliente','clientes','pagos','pagosDetalle1','pagosDetalle2','pagosDetalle3','pagosDetalle4', 'pagosDetalle5', 'pagosDetalle6', 'pagosDetalle7', 'pagosDetalle8', 'pagosDetalle9', 'pagosDetalle10', 'pagosDetalle11', 'pagosDetalle12','pagosFecha1','pagosFecha2','pagosFecha3','pagosFecha4', 'pagosFecha5', 'pagosFecha6', 'pagosFecha7', 'pagosFecha8', 'pagosFecha9', 'pagosFecha10', 'pagosFecha11', 'pagosFecha12', 'cantidadPagada','pagosRealizados'));
    }
}
