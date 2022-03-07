<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use  App\Models\User;
use  App\Models\Direccion;
use  App\Models\Puesto;
use  App\Models\EncuestaSalida;
use  App\Models\Zona;
use  App\Models\Sucursal;
use  App\Models\Documentacion;
use  App\Models\Documentacion_User;

class RhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $usuarios = new User();
     $usuarios = $usuarios->all();
     $jefeDirectos = User::where("puesto",0)->get();
     $puestos = new Puesto();
     $puestos = $puestos->all();
     $encuestaSalida = new EncuestaSalida();
     $encuestaSalida = $encuestaSalida->all();
     $zonas = new Zona();
     $zonas = $zonas->all();
     $sucursales = new Sucursal();
     $sucursales = $sucursales->all();

     //$ = User::findorfail(1);
     

     return view('RH.index',compact('usuarios','jefeDirectos','puestos','encuestaSalida','zonas','sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $usuarios = User::all();
      $jefeDirectos = User::where("puesto",0)->get();
      $puestos = Puesto::all();
      $zonas = Zona::all();
      $sucursales = Sucursal::all();
     $documentacion = Documentacion::where("status_concepto",1)->get();
      return view('rh.createEdit',compact('usuarios','jefeDirectos','puestos','zonas','sucursales','documentacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $todolist = json_decode(stripslashes($request->todolist));

      $direccion = new Direccion();
      $direccion ->calle = $request->calle;
      $direccion ->colonia = $request->colonia;
      $direccion ->cp = $request->CP;
      $direccion ->numero_interior = $request->numero_interior;
      $direccion ->numero_exterior= $request->numero_exterior;
      $direccion ->estado = $request->estado;
      $direccion ->ciudad = $request->ciudad;
      $direccion ->save();
      


      $usuario = new User();
      $usuario ->name = $request->name;
      $usuario ->apellidos = $request->apellido_paterno." ".$request->apellido_materno;
      $usuario ->direccion_id = $direccion->id;
      $usuario ->nss = $request->nss;
      $usuario ->rfc = $request->rfc;
      $usuario ->curp = $request->curp;
      $usuario ->usuario = $request->name;
      $usuario ->fecha_entrada = $request->fechaEntrada;
      $usuario ->dias_vacaciones = $request->diasVacaciones;
      $usuario ->jefe_directo = $request->jefeDirecto;
      $usuario ->puesto = $request->puesto;
      $usuario ->encuesta_salida_id = $request->encuestaSalida;
      $usuario ->zona = $request->zona;
      $usuario ->sucursal = $request->sucursal;
      $usuario ->razon_social = 1;
      $usuario ->password = $request->email;
      $usuario ->email = $request->password;
      $usuario ->save();

         foreach ($todolist as  $object) {
            $documentos = new Documentacion_User();
            $documentos ->documentacion_id = $object;
            $documentos ->user_id = $usuario->id;
            $documentos ->save();

        }

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
        $user = User::findorfail($id);
        $jefeDirectos = User::where("puesto",0)->get();
        $puestos = Puesto::all();
        $encuestaSalida = EncuestaSalida::all();
        $zonas = Zona::all();
        $sucursales = Sucursal::all();
        $documentacion = Documentacion::all();
        return view('rh.createEdit',compact('user','jefeDirectos','puestos','encuestaSalida','zonas','sucursales','documentacion'));
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
