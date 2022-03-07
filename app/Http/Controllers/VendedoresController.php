<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedore;
use App\Models\Zona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = new Vendedore();
        $vendedores = $vendedores->all();
         return view('vendedores.index',compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $vendedores = new Vendedore();
      $vendedores ->numero = $request->numero;
      $vendedores->usuario_creo = Auth::user()->id;
      $vendedores ->save();

      Session::flash('flash_message', '¡Zona creada correctamente!.');

      return redirect('vendedores');
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
        $vendedores = Vendedore::findorfail($id);
      return view('vendedores.edit',compact('vendedores'));
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
      $vendedores = Vendedore::find($id);
      $vendedores ->numero = $request->numero;
      $vendedores->ultimo_usuario_modifico = Auth::user()->id;
      $vendedores ->save();


      return redirect('vendedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedores = Vendedore::find($id);
        $vendedores->usuario_elimino = Auth::user()->id;
        $vendedores->save();
        $vendedores->delete();
        return redirect('vendedores');
    }
}
