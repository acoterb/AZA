<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vendedore;
use App\Models\Vehiculos;
use App\Models\Licencia;
use App\Models\Contratos;
use App\Models\Cobradore;
use App\Models\Zona;
use App\Models\Grua;
use PDF;
use App\Models\Logs;
use App\Models\Direccion;
use App\Models\Pagos;
use App\Models\Pagos_detalle;
use App\Models\Pagos_fecha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:clientes_view')->only('index');
        $this->middleware('can:clientes_create')->only('create');
        $this->middleware('can:clientes_create')->only('store');
        $this->middleware('can:clientes_edit')->only('update');
        $this->middleware('can:clientes_destroy')->only('destroy');
    }
    public function index()
    {
                $clientes = new Contratos();
                $clientes = $clientes->all();
        return view('clientes.index', compact('clientes'));
    }

       public function correcion()
    {


       $pacientes = DB::table('pagos')
        ->leftjoin('pagos_detalles', function ($join){
            $join->on('pagos.id', '=', 'pagos_detalles.pago_id');
        })
        ->whereNotNull('pagos.pagoinicial')
        ->Where('pagos_detalles.num_pago', '>', '0')
        ->Where('pagos_detalles.cantidad', '>', '0')
        ->whereNotNull('fecha_pago')
        ->select('pagos.id','pagos.pagoinicial','pagos.fecha_siguiente_pago','pagos.numeropagos','pagos.costoservicio','pagos.pagosrealizados','pagos_detalles.num_pago','pagos_detalles.fecha_pago','pagos_detalles.cantidad')
        ->get();
        foreach ($pacientes as $key => $pacientes) {

          $pacientes->fecha_siguiente_pago = Carbon::createFromFormat('Y-m-d',$pacientes->fecha_pago )->addDay(30)->toDateTimeString();
         $actualizar = Pagos::findorfail($pacientes->id);
          $actualizar->fecha_siguiente_pago = $pacientes->fecha_siguiente_pago;
        $actualizar->save();

        }


          return redirect('/');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $contrato = DB::table('contratos')->orderBy('id', 'DESC')->first();
      $vendedor = new Vendedore();
      $vendedor = $vendedor->all();
      $cobrador = new Cobradore();
      $cobrador = $cobrador->all();

       return view('clientes.create',compact('vendedor','cobrador','contrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    //dd($request->fechaInicio);
    $ultimaPoliza =  new Contratos();
    $ultimaPoliza = $ultimaPoliza->all();

    if(count($ultimaPoliza) > 0){
        $ultimaPoliza = $ultimaPoliza->last();
        $ultimaPoliza = $ultimaPoliza->poliza;
        $tamañoPoliza =  strlen($ultimaPoliza);
        $numConsecutivo = intval(substr($ultimaPoliza, $tamañoPoliza-5));
    }else{
      $numConsecutivo = 0;
    }

    if($numConsecutivo <10){
        $poliza = "A°-".substr($request->fechaInicio, 8).substr($request->fechaInicio, 5,-3).intval(substr($request->fechaInicio,0,-6)+1).$request->vendedor."-0000".intval($numConsecutivo+1);
    }else if ($numConsecutivo >=10 && $numConsecutivo <100 ){
        $poliza = "A°-".substr($request->fechaInicio, 8).substr($request->fechaInicio, 5,-3).intval(substr($request->fechaInicio,0,-6)+1).$request->vendedor."-000".intval($numConsecutivo+1);
    }else if ($numConsecutivo >=100 && $numConsecutivo <1000 ){
        $poliza = "A°-".substr($request->fechaInicio, 8).substr($request->fechaInicio, 5,-3).intval(substr($request->fechaInicio,0,-6)+1).$request->vendedor."-00".intval($numConsecutivo+1);
    }else if ($numConsecutivo >=1000 && $numConsecutivo <10000 ){
        $poliza = "A°-".substr($request->fechaInicio, 8).substr($request->fechaInicio, 5,-3).intval(substr($request->fechaInicio,0,-6)+1).$request->vendedor."-0".intval($numConsecutivo+1);
    }else{
        $poliza = "A°-".substr($request->fechaInicio, 8).substr($request->fechaInicio, 5,-3).intval(substr($request->fechaInicio,0,-6)+1).$request->vendedor."-".intval($numConsecutivo+1);
    }
     
      $direccion = new Direccion();
      $direccion ->calle = $request->calle;
      $direccion ->colonia = $request->colonia;
      $direccion ->cruzes = $request->cruzes;
      $direccion ->estado = $request->estadoDireccion;
      $direccion ->ciudad = $request->ciudad;
      $direccion ->save();


      $vehiculo = new Vehiculos();

      $vehiculo ->marca = $request->marca;
      $vehiculo ->submarca = $request->submarca;
      $vehiculo ->tipo = $request->tipo;
      $vehiculo ->modelo = $request->modelo;
      $vehiculo ->servicio = $request->servicio;
      $vehiculo ->color = $request->color;
      $vehiculo ->placas = $request->placas;
      $vehiculo ->estado = $request->estadoVehiculo;
      $vehiculo ->nserie = $request->serie;
      $vehiculo ->nregistro = $request->registro;
      $vehiculo ->nmotor = $request->motor;
      $vehiculo->save();

      $cliente = new Cliente();
      $cliente ->nombres = $request->nombre;
      $cliente ->apellidos = $request->Apellidos;
      $cliente ->telefono = $request->telefono;
      $cliente ->telefono_emergencia = $request->telefono_emergencia;
      $cliente ->direccions_id = $direccion->id;
      $cliente ->save();

      $licencia = new Licencia();
      $licencia ->nlicencia = $request->licencia;
      $licencia ->clase = $request->clase;
      $licencia ->expira = $request->expira;
      $licencia ->estado = $request->estadoLicencia;
      $licencia ->save();

      $contrato = new Contratos();
      $contrato ->status_id = $request->status;
      //$contrato ->navidena = $request->navideno;
      $contrato ->poliza = $poliza;
      $contrato ->vehiculo_id = $vehiculo->id;
      $contrato ->tipo = $request->tipoPoliza;
      $contrato ->cobrador_id = $request->cobrador;
      $contrato ->vendedor_id = $request->vendedor;
      $contrato ->cliente_id = $cliente->id;
      $contrato ->licencia_id = $licencia->id;
      $contrato ->plazo = $request->plazo;
      $contrato ->desde = $request->fechaInicio;
      $contrato ->hasta = $request->hasta;
      $contrato ->observaciones = $request->observaciones;
      $contrato ->observacion_privada = $request->observacionesPrivada;
      $contrato ->usuario = Auth::user()->id;
      $contrato->usuario_creo = Auth::user()->id;
      $contrato -> save();

      $pago = new Pagos();
      $pago ->contrato_id = $contrato->id;
      $pago ->forma_pago = $request->formaPago;
      $pago ->pagoinicial = $request->fechaPrimerPago;
      $pago ->numeropagos = $request->plazoP;
      $pago ->costoservicio = $request->precio;
      $pago ->pagosrealizados = 0;
      $pago ->save();

      $pagoDetalle = new Pagos_detalle();
      $pagoDetalle ->pago_id = $pago->id;
      $pagoDetalle ->usuario = Auth::user()->id;
      $pagoDetalle->usuario_creo = Auth::user()->id;
      $pagoDetalle ->save();

    for($i = 1 ; $i <= $request->plazoP; $i++){
      $pagoFecha = new Pagos_fecha();
      $pagoFecha ->contrato_id = $contrato->id;
      $pagoFecha ->num_pago = $i;
      $pagoFecha ->fecha_pago = date("Y-m-d",strtotime($request->fechaInicio."+".$i." month"));
      $pagoFecha ->usuario_id = 0;
      $pagoFecha ->save();
    }

    return redirect('cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          $contrato = Contratos::findorfail($id);
          $cliente = Cliente::where('id', $contrato->cliente_id)->first();
          $direccion = Direccion::where('id',$cliente->direccions_id)->first();
          $pagos = Pagos::where('contrato_id',$contrato->id)->first();

          return view('clientes.show',compact('contrato','direccion','pagos'));
    }


        public function poliza($id)
    {

          $contrato = Contratos::findorfail($id);
          $cliente = Cliente::where('id', $contrato->cliente_id)->first();
          $direccion = Direccion::where('id',$cliente->direccions_id)->first();
          $vehiculo = Vehiculos::where('id',$contrato->vehiculo_id)->first();
          $licencia = Licencia::where('id',$contrato->licencia_id)->first();
          $pagos = Pagos::where('contrato_id',$contrato->id)->first();
        if($contrato->tipo == "D")
        {
            return view('clientes.polizaD',compact('contrato','direccion','vehiculo','licencia','pagos'));
        }
    else
    {
        return view('clientes.poliza',compact('contrato','direccion','vehiculo','licencia','pagos'));
    }

    }
       public function polizaEpson230($id)
    {

          $contrato = Contratos::findorfail($id);
          $cliente = Cliente::where('id', $contrato->cliente_id)->first();
          $direccion = Direccion::where('id',$cliente->direccions_id)->first();
          $vehiculo = Vehiculos::where('id',$contrato->vehiculo_id)->first();
          $licencia = Licencia::where('id',$contrato->licencia_id)->first();
          $pagos = Pagos::where('contrato_id',$contrato->id)->first();
        if($contrato->tipo == "D")
        {
            return view('clientes.polizaD2',compact('contrato','direccion','vehiculo','licencia','pagos'));
        }

    }
  public function vehiculo($id)
    {
         $clientes = User::findorfail($id);
        return view('clientes.vehiculos', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

      $grua = Grua::where('contrato_id',$cliente->id)->first();
      if($grua == null){  $grua = new Grua;  }

       return view('clientes.edit',compact('vendedor','cobrador','cliente','clientes','pagos','pagosDetalle1','pagosDetalle2','pagosDetalle3','pagosDetalle4', 'pagosDetalle5', 'pagosDetalle6', 'pagosDetalle7', 'pagosDetalle8', 'pagosDetalle9', 'pagosDetalle10', 'pagosDetalle11', 'pagosDetalle12', 'grua','pagosFecha1','pagosFecha2','pagosFecha3','pagosFecha4', 'pagosFecha5', 'pagosFecha6', 'pagosFecha7', 'pagosFecha8', 'pagosFecha9', 'pagosFecha10', 'pagosFecha11', 'pagosFecha12'));
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
      $contrato = Contratos::findorfail($id);
      $contrato ->status_id = $request->status;
      $contrato ->poliza = $request->poliza;

      $vehiculo = Vehiculos::findorfail($contrato->vehiculo_id);
      $vehiculo ->marca = $request->marca;
      $vehiculo ->submarca = $request->submarca;
      $vehiculo ->tipo = $request->tipo;
      $vehiculo ->modelo = $request->modelo;
      $vehiculo ->servicio = $request->servicio;
      $vehiculo ->color = $request->color;
      $vehiculo ->placas = $request->placas;
      $vehiculo ->estado = $request->estadoVehiculo;
      $vehiculo ->nserie = $request->serie;
      $vehiculo ->nregistro = $request->registro;
      $vehiculo ->nmotor = $request->motor;
      $vehiculo->save();

      $contrato ->tipo = $request->tipoPoliza;
      $contrato ->cobrador_id = $request->cobrador;
      $contrato ->vendedor_id = $request->vendedor;

      $cliente =  Cliente::findorfail($contrato ->cliente_id);
      $cliente ->nombres = $request->nombre;
      $cliente ->apellidos = $request->Apellidos;
      $cliente ->telefono = $request->telefono;
      $cliente ->telefono_emergencia = $request->telefono_emergencia;
      $cliente ->save();

      $direccion = Direccion::findorfail($cliente ->direccions_id);
      $direccion ->calle = $request->calle;
      $direccion ->colonia = $request->colonia;
      $direccion ->cruzes = $request->cruzes;
      $direccion ->estado = $request->estadoDireccion;
      $direccion ->ciudad = $request->ciudad;
      $direccion ->save();

      $licencia = Licencia::findorfail($contrato ->licencia_id);
      $licencia ->nlicencia = $request->licencia;
      $licencia ->clase = $request->clase;
      $licencia ->expira = $request->expira;
      $licencia ->estado = $request->estadoLicencia;
      $licencia ->save();

      $contrato ->plazo = $request->plazo;
      $contrato ->desde = $request->fechaInicio;
      $contrato ->hasta = $request->hasta;
     // $contrato ->navidena = $request->navideno;
      $contrato ->observaciones = $request->observaciones;
      $contrato ->observacion_privada = $request->observacionesPrivada;
      $contrato->ultimo_usuario_modifico = Auth::user()->id;
      $contrato -> save();

      $grua = Grua::where('contrato_id',$contrato->id)->first();
    if ($grua == null){
      $grua = new Grua();
      $grua ->contrato_id = $contrato->id;
      $grua ->disponible = $request->disponible_grua;
      $grua ->fecha_uso = $request->fecha_uso;
      $grua ->lugar_compustura = $request->lugar_compustura;
      $grua ->lugar_arribo = $request->lugar_arribo;
      $grua ->save();
    }else{
      $grua ->disponible = $request->disponible_grua;
      $grua ->fecha_uso = $request->fecha_uso;
      $grua ->lugar_compustura = $request->lugar_compustura;
      $grua ->lugar_arribo = $request->lugar_arribo;
      $grua ->save();
    }
      $pago = Pagos::where('contrato_id', $contrato->id)->first();
      $pago ->numeropagos = $request->plazoP;
      $pago ->costoservicio = $request->costo;

    if($request->pago1FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','1')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago1FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago1FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 1;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago2FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','2')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago2FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago2FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 2;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago3FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','3')->first();
     if($pagoFecha){
     $pagoFecha->fecha_pago = $request->pago3FechaPropuesta;
     $pagoFecha->usuario_id = Auth::user()->id;
     $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago3FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 3;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago4FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','4')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago4FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago4FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 4;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago5FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','5')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago5FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago5FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 5;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago6FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','6')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago6FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago6FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 6;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago7FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','7')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago7FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago7FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 7;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago8FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','8')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago8FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago8FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 8;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago9FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','9')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago9FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago9FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 9;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago10FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','10')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago10FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago10FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 10;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago11FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','11')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago11FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago11FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 11;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

    if($request->pago12FechaPropuesta){
     $pagoFecha =  Pagos_fecha::where('contrato_id',$contrato->id)->where('num_pago','12')->first();
     if($pagoFecha){
        $pagoFecha->fecha_pago = $request->pago12FechaPropuesta;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }else{
        $pagoFecha =  new Pagos_fecha();
        $pagoFecha->fecha_pago = $request->pago12FechaPropuesta;
        $pagoFecha->contrato_id = $contrato->id;
        $pagoFecha->num_pago = 12;
        $pagoFecha->usuario_id = Auth::user()->id;
        $pagoFecha->save();
     }
    }

      $pagosDetalle1 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','1')->first();
      $pagosDetalle2 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','2')->first();
      $pagosDetalle3 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','3')->first();
      $pagosDetalle4 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','4')->first();
      $pagosDetalle5 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','5')->first();
      $pagosDetalle6 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','6')->first();
      $pagosDetalle7 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','7')->first();
      $pagosDetalle8 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','8')->first();
      $pagosDetalle9 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','9')->first();
      $pagosDetalle10 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','10')->first();
      $pagosDetalle11 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','11')->first();
      $pagosDetalle12 = Pagos_detalle::where('pago_id',$pago->id)->where('num_pago','12')->first();

      if($pagosDetalle1){
        $pagosDetalle1->fecha_pago = $request->pago1Fecha;
        $pagosDetalle1->cantidad = $request->pago1Cantidad;
        $pagosDetalle1->concepto = $request->concepto1;
        $pagosDetalle1->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle1->save();
      }else if(!$pagosDetalle1 && $request->pago1 == 1){
        $pagosDetalle1 = new Pagos_detalle();
        $pagosDetalle1->pago_id = $pago->id;
        $pagosDetalle1->num_pago = 1;
        $pagosDetalle1->fecha_pago = $request->pago1Fecha;
        $pagosDetalle1->cantidad = $request->pago1Cantidad;
        $pagosDetalle1->concepto = $request->concepto1;
        $pagosDetalle1->usuario_creo = Auth::user()->id;
        $pagosDetalle1->save();
      }
       if($pagosDetalle2){
        $pagosDetalle2->fecha_pago = $request->pago2Fecha;
        $pagosDetalle2->cantidad = $request->pago2Cantidad;
        $pagosDetalle2->concepto = $request->concepto2;
        $pagosDetalle2->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle2->save();
      }else if(!$pagosDetalle2 && $request->pago2 == 1){
        $pagosDetalle2 = new Pagos_detalle();
        $pagosDetalle2->pago_id = $pago->id;
        $pagosDetalle2->num_pago = 2;
        $pagosDetalle2->fecha_pago = $request->pago2Fecha;
        $pagosDetalle2->cantidad = $request->pago2Cantidad;
        $pagosDetalle2->concepto = $request->concepto2;
        $pagosDetalle2->usuario_creo = Auth::user()->id;
        $pagosDetalle2->save();
      }
      if($pagosDetalle3){
        $pagosDetalle3->fecha_pago = $request->pago3Fecha;
        $pagosDetalle3->cantidad = $request->pago3Cantidad;
        $pagosDetalle3->concepto = $request->concepto3;
        $pagosDetalle3->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle3->save();
      }else if(!$pagosDetalle3 && $request->pago3 == 1){
        $pagosDetalle3 = new Pagos_detalle();
        $pagosDetalle3->pago_id = $pago->id;
        $pagosDetalle3->num_pago = 3;
        $pagosDetalle3->fecha_pago = $request->pago3Fecha;
        $pagosDetalle3->cantidad = $request->pago3Cantidad;
        $pagosDetalle3->concepto = $request->concepto3;
        $pagosDetalle3->usuario_creo = Auth::user()->id;
        $pagosDetalle3->save();
      }
      if($pagosDetalle4){
        $pagosDetalle4->fecha_pago = $request->pago4Fecha;
        $pagosDetalle4->cantidad = $request->pago4Cantidad;
        $pagosDetalle4->concepto = $request->concepto4;
        $pagosDetalle4->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle4->save();
      }else if(!$pagosDetalle4 && $request->pago4 == 1){
        $pagosDetalle4 = new Pagos_detalle();
        $pagosDetalle4->pago_id = $pago->id;
        $pagosDetalle4->num_pago = 4;
        $pagosDetalle4->fecha_pago = $request->pago4Fecha;
        $pagosDetalle4->cantidad = $request->pago4Cantidad;
        $pagosDetalle4->concepto = $request->concepto4;
        $pagosDetalle4->usuario_creo = Auth::user()->id;
        $pagosDetalle4->save();
      }
      if($pagosDetalle5){
        $pagosDetalle5->fecha_pago = $request->pago5Fecha;
        $pagosDetalle5->cantidad = $request->pago5Cantidad;
        $pagosDetalle5->concepto = $request->concepto5;
        $pagosDetalle5->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle5->save();
      }else if(!$pagosDetalle5 && $request->pago5 == 1){
        $pagosDetalle5 = new Pagos_detalle();
        $pagosDetalle5->pago_id = $pago->id;
        $pagosDetalle5->num_pago = 5;
        $pagosDetalle5->fecha_pago = $request->pago5Fecha;
        $pagosDetalle5->cantidad = $request->pago5Cantidad;
        $pagosDetalle5->concepto = $request->concepto5;
        $pagosDetalle5->usuario_creo = Auth::user()->id;
        $pagosDetalle5->save();
      }
      if($pagosDetalle6){
        $pagosDetalle6->fecha_pago = $request->pago6Fecha;
        $pagosDetalle6->cantidad = $request->pago6Cantidad;
        $pagosDetalle6->concepto = $request->concepto6;
        $pagosDetalle6->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle6->save();
      }else if(!$pagosDetalle6 && $request->pago6 == 1){
        $pagosDetalle6 = new Pagos_detalle();
        $pagosDetalle6->pago_id = $pago->id;
        $pagosDetalle6->num_pago = 6;
        $pagosDetalle6->fecha_pago = $request->pago6Fecha;
        $pagosDetalle6->cantidad = $request->pago6Cantidad;
        $pagosDetalle6->concepto = $request->concepto6;
        $pagosDetalle6->usuario_creo = Auth::user()->id;
        $pagosDetalle6->save();
      }
      if($pagosDetalle7){
        $pagosDetalle7->fecha_pago = $request->pago7Fecha;
        $pagosDetalle7->cantidad = $request->pago7Cantidad;
        $pagosDetalle7->concepto = $request->concepto7;
        $pagosDetalle7->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle7->save();
      }else if(!$pagosDetalle7 && $request->pago7 == 1){
        $pagosDetalle7 = new Pagos_detalle();
        $pagosDetalle7->pago_id = $pago->id;
        $pagosDetalle7->num_pago = 7;
        $pagosDetalle7->fecha_pago = $request->pago7Fecha;
        $pagosDetalle7->cantidad = $request->pago7Cantidad;
        $pagosDetalle7->concepto = $request->concepto7;
        $pagosDetalle7->usuario_creo = Auth::user()->id;
        $pagosDetalle7->save();
      }
      if($pagosDetalle8){
        $pagosDetalle8->fecha_pago = $request->pago8Fecha;
        $pagosDetalle8->cantidad = $request->pago8Cantidad;
        $pagosDetalle8->concepto = $request->concepto8;
        $pagosDetalle8->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle8->save();
      }else if(!$pagosDetalle8 && $request->pago8 == 1){
        $pagosDetalle8 = new Pagos_detalle();
        $pagosDetalle8->pago_id = $pago->id;
        $pagosDetalle8->num_pago = 8;
        $pagosDetalle8->fecha_pago = $request->pago8Fecha;
        $pagosDetalle8->cantidad = $request->pago8Cantidad;
        $pagosDetalle8->concepto = $request->concepto8;
        $pagosDetalle8->usuario_creo = Auth::user()->id;
        $pagosDetalle8->save();
      }
      if($pagosDetalle9){
        $pagosDetalle9->fecha_pago = $request->pago9Fecha;
        $pagosDetalle9->cantidad = $request->pago9Cantidad;
        $pagosDetalle9->concepto = $request->concepto9;
        $pagosDetalle9->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle9->save();
      }else if(!$pagosDetalle9 && $request->pago9 == 1){
        $pagosDetalle9 = new Pagos_detalle();
        $pagosDetalle9->pago_id = $pago->id;
        $pagosDetalle9->num_pago = 9;
        $pagosDetalle9->fecha_pago = $request->pago9Fecha;
        $pagosDetalle9->cantidad = $request->pago9Cantidad;
        $pagosDetalle9->concepto = $request->concepto9;
        $pagosDetalle9->usuario_creo = Auth::user()->id;
        $pagosDetalle9->save();
      }
      if($pagosDetalle10){
        $pagosDetalle10->fecha_pago = $request->pago10Fecha;
        $pagosDetalle10->cantidad = $request->pago10Cantidad;
        $pagosDetalle10->concepto = $request->concepto10;
        $pagosDetalle10->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle10->save();
      }else if(!$pagosDetalle10 && $request->pago10 == 1){
        $pagosDetalle10 = new Pagos_detalle();
        $pagosDetalle10->pago_id = $pago->id;
        $pagosDetalle10->num_pago = 10;
        $pagosDetalle10->fecha_pago = $request->pago10Fecha;
        $pagosDetalle10->cantidad = $request->pago10Cantidad;
        $pagosDetalle10->concepto = $request->concepto10;
        $pagosDetalle10->usuario_creo = Auth::user()->id;
        $pagosDetalle10->save();
      }
      if($pagosDetalle11){
        $pagosDetalle11->fecha_pago = $request->pago11Fecha;
        $pagosDetalle11->cantidad = $request->pago11Cantidad;
        $pagosDetalle11->concepto = $request->concepto11;
        $pagosDetalle11->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle11->save();
      }else if(!$pagosDetalle11 && $request->pago11 == 1){
        $pagosDetalle11 = new Pagos_detalle();
        $pagosDetalle11->pago_id = $pago->id;
        $pagosDetalle11->num_pago = 1;
        $pagosDetalle11->fecha_pago = $request->pago11Fecha;
        $pagosDetalle11->cantidad = $request->pago11Cantidad;
        $pagosDetalle11->concepto = $request->concepto11;
        $pagosDetalle11->usuario_creo = Auth::user()->id;
        $pagosDetalle11->save();
      }
      if($pagosDetalle12){
        $pagosDetalle12->fecha_pago = $request->pago12Fecha;
        $pagosDetalle12->cantidad = $request->pago12Cantidad;
        $pagosDetalle12->concepto = $request->concepto12;
        $pagosDetalle12->ultimo_usuario_modifico = Auth::user()->id;
        $pagosDetalle12->save();
      }else if(!$pagosDetalle12 && $request->pago12 == 1){
        $pagosDetalle12 = new Pagos_detalle();
        $pagosDetalle12->pago_id = $pago->id;
        $pagosDetalle12->num_pago = 12;
        $pagosDetalle12->fecha_pago = $request->pago12Fecha;
        $pagosDetalle12->cantidad = $request->pago12Cantidad;
        $pagosDetalle12->concepto = $request->concepto1;
        $pagosDetalle12->usuario_creo = Auth::user()->id;
        $pagosDetalle12->save();
      }

      $pago ->pagosrealizados = count(Pagos_detalle::where('pago_id',$pago->id)->where('cantidad','>',0)->get());
      $pago ->pagoinicial = $request->pagoInicial;
      $pago ->numeropagos = $request->numPagos;

      $pago ->save();
      return redirect('cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


     public function paginado(Request $request)
    {
      $nTotalData = Contratos::count();
      $nTotalFiltered = $nTotalData;
      $nLimit = $request->length;
      $nStart = $request->start;
      $sDir = $request->order['0']['dir'];


      if ($request->search['value'] != null) {
        $pacientes = DB::table('contratos')
        ->leftjoin('clientes', function ($join){
            $join->on('contratos.cliente_id', '=', 'clientes.id');
        })
        ->leftjoin('vehiculos', function ($join){
            $join->on('contratos.vehiculo_id', '=', 'vehiculos.id');
        })
        ->where('contratos.poliza', 'LIKE', '%'.$request->search['value'].'%')
        ->orWhere('clientes.nombres', 'LIKE', '%'.$request->search['value'].'%')
        ->orWhere('clientes.apellidos', 'LIKE', '%'.$request->search['value'].'%')
        ->orWhere('vehiculos.placas', 'LIKE', '%'.$request->search['value'].'%')
        ->orWhere('contratos.desde', 'LIKE', '%'.$request->search['value'].'%')
        ->select('contratos.id','clientes.nombres','clientes.apellidos','contratos.poliza','contratos.status_id','contratos.desde','contratos.vendedor_id','vehiculos.placas')
        ->offset($nStart)
        ->limit($nLimit)
        ->orderBy("id", 'desc');

        $nTotalFiltered = $pacientes->count();
        $pacientes = $pacientes->get();
      } else {
        $pacientes = Contratos::offset($nStart)
        ->limit($nLimit)
        ->orderBy('id','desc')
        ->get();
      }
      $aPacientes = [];

      foreach ($pacientes as $key => $oPaciente) {
        $aDatos = [
            'nombre' => $oPaciente->nombres,
            'apellidos' => $oPaciente->apellidos,
            '#Poliza' => $oPaciente->poliza,
            'estado' => $oPaciente->status_id,
            'fecha' => $oPaciente->desde,
            'vendedor' => $oPaciente->vendedor_id,
            'placa' => $oPaciente->placas,
            'editar' => '<a  target="_blank" href="'.route('cliente.edit',$oPaciente->id).'"> <button class="btn btn-primary"> <i class="fas fa-edit"></i> </button> </a>',
            'imprimir_Pagare_HP' => '<a target="_blank" href="'.route('cliente.show',$oPaciente->id).'"><button class="btn btn-primary"><i class="fas fa-money-check"></i></button></a>',
            'poliza' => '<a target="_blank" href="'.route('poliza',$oPaciente->id).'"><button class="btn btn-primary"><i class="fas fa-money-check"></i></button></a>',
            'poliza-epson230' => '<a target="_blank" href="'.route('poliza-epson230',$oPaciente->id).'"><button class="btn btn-primary"><i class="fas fa-money-check"></i></button></a>'
        ];

        $aPacientes[] = $aDatos;
      }

      $aJsonData = array(
        "draw"            => intval($request->draw),
        "recordsTotal"    => intval($nTotalData),
        "recordsFiltered" => intval($nTotalFiltered),
        "data"            => $aPacientes
      );
      $sRespuesta = json_encode($aJsonData);

      return $sRespuesta;

    }


}
