<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cobradore;
use App\Models\Zona;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CobradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobradores = new Cobradore();
        $cobradores = $cobradores->all();


         return view('cobradores.index',compact('cobradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zonas = new Zona();
        $zonas = $zonas->all();
        return view('cobradores.create',compact('zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cobradores = new Cobradore();
      $cobradores ->nombre = $request->nombre;
      $cobradores ->zona_id = $request->zona;
      $cobradores->usuario_creo = Auth::user()->id;
      $cobradores ->save();

      Session::flash('flash_message', '¡Zona creada correctamente!.');

      return redirect('cobradores');
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
        $cobradores = Cobradore::findorfail($id);
          $zonas = new Zona();
        $zonas = $zonas->all();
      return view('cobradores.edit',compact('cobradores','zonas'));
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
      $cobradores = Cobradore::find($id);
      $cobradores ->nombre = $request->nombre;
      $cobradores ->zona_id = $request->zona;
      $cobradores->ultimo_usuario_modifico = Auth::user()->id;
      $cobradores ->save();

      Session::flash('flash_message', '¡Zona creada correctamente!.');

      return redirect('cobradores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cobradores = Cobradore::find($id);
        $cobradores->usuario_elimino = Auth::user()->id;
        $cobradores->save();
        $cobradores->delete();
        return redirect('cobradores');
    }
}
