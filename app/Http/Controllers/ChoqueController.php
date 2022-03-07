<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choque;
use App\Models\Contratos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ChoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('choques.index');
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

        $numChoques = intval($request->numeroChoques + 1);
     
      $direccion = new Choque();
      $direccion ->status = $request->juridico;
      $direccion ->contratos_id = $request->contrato_id;
      $direccion ->fecha_choque = $request->fechaChoque;
      $direccion ->num_choques = $numChoques;
      $direccion ->descripcion = $request->descripcion;
      $direccion ->save(); 
      return view('choques.index');
    }
     public function buscado(Request $request)
    {
            $poliza = DB::table('contratos')
        ->leftjoin('clientes', function ($join){
            $join->on('contratos.cliente_id', '=', 'clientes.id');
        })
        ->leftjoin('vehiculos', function ($join){
            $join->on('contratos.vehiculo_id', '=', 'vehiculos.id');
        })
        ->leftjoin('choques',function ($join){
            $join->on('contratos.id','=','choques.contratos_id');
        })
        ->where('contratos.poliza', 'LIKE', '%'.$request->poliza.'%')
        ->orderby('choques.id','DESC')->first();

       return view('choques.resultado',compact('poliza'));
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
