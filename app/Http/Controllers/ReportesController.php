<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedore;
use App\Exports\reporteDia;
use App\Exports\reporteSemana;
use App\Exports\reporteRenovaciones;
use App\Exports\reporteSemanaVendedor;
use App\Exports\reporteCreados;
use Maatwebsite\Excel\Facades\Excel;
class ReportesController extends Controller
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
        return view('reportes.index',compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.cobros');
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


    public function reportaDia (Request $request)
    {
        $fecha = $request->fecha;

        switch ($request->radioTipoExportacion) {
        //para el caso de excel
        case 1:
            return Excel::download(new reporteDia($request->fecha), 'reporteDia.xlsx');
          break;
        //para el caso de PDF O PANTALLA
        

        default:
          // code...
          break;
      }
    }
        public function reporteSemana (Request $request)
    {
        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;

        switch ($request->radioTipoExportacion) {
        //para el caso de excel
        case 1:
            return Excel::download(new reporteSemana($fechaInicio,$fechaFinal), 'reporteSemana.xlsx');
          break;
        //para el caso de PDF O PANTALLA
            case 2:
            return Excel::download(new reporteCreados($fechaInicio,$fechaFinal), 'reporteSemana.xlsx');
          break;

        default:
          // code...
          break;
      }
    }
            public function reporteRenovacione (Request $request)
    {
        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;

        switch ($request->radioTipoExportacion) {
        //para el caso de excel
        case 1:
            return Excel::download(new reporteRenovaciones($fechaInicio,$fechaFinal), 'reporteRenovaciones.xlsx');
          break;
        //para el caso de PDF O PANTALLA
            case 2:
            return Excel::download(new reporteRenovaciones($fechaInicio,$fechaFinal), 'reporteRenovaciones.xlsx');
          break;

        default:
          // code...
          break;
      }
    }
          public function reporteSemanaVendedor (Request $request)
    {
        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;
        $vendedor = $request->vendedor;

        switch ($request->radioTipoExportacion) {
        //para el caso de excel
        case 1:
            return Excel::download(new reporteSemanaVendedor($fechaInicio,$fechaFinal,$vendedor), 'reporteSemanaVendedor.xlsx');
          break;
        //para el caso de PDF O PANTALLA
            case 2:
            return Excel::download(new reporteSemanaVendedor($fechaInicio,$fechaFinal,$vendedor), 'reporteSemanaVendedor.xlsx');
          break;

        default:
          // code...
          break;
      }
    }
}
