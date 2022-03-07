<?php

namespace App\Exports;

use App\Models\Contratos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class reporteRenovaciones implements FromCollection,WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */

    public function __construct(string $fechaInicio,string $fechaFinal)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;


    }

    public function headings(): array
    {
          return [
              'fecha_vencimiento',
              'poliza',
              'nombre',
              'apellidos',
              'numero',
              'calle',
              'vendedor',
              'costo',
              'Pagos realizados'
              
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('contratos')
             ->join('clientes', function ($join){
                 $join->on('clientes.id', '=', 'contratos.cliente_id');
             })
                ->join('direccions', function ($join){
                 $join->on('direccions.id', '=', 'clientes.direccions_id');
             })
                ->join('pagos', function ($join){
                 $join->on('pagos.contrato_id', '=', 'contratos.id');
             })
                 ->join('pagos_detalles', function ($join){
                 $join->on('pagos_detalles.pago_id', '=', 'pagos.id');
             })
             ->whereBetween("contratos.hasta",[$this->fechaInicio,$this->fechaFinal])->where('pagos_detalles.cantidad','>',0)->select('contratos.hasta','contratos.poliza','clientes.nombres','clientes.apellidos','clientes.telefono','direccions.calle','contratos.vendedor_id','pagos.costoservicio',DB::raw('count("pagos_detalles.cantidad")'))
             ->groupBy('contratos.hasta','contratos.poliza','clientes.nombres','clientes.apellidos','clientes.telefono','direccions.calle','contratos.vendedor_id','pagos.costoservicio')
             ->get();

         return $reporte;

    }
}
