<?php

namespace App\Exports;

use App\Models\Pagos_detalles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class reporteSemana implements FromCollection,WithHeadings
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
              'fecha_pago',
              'cantidad',
              'concepto',
              'poliza',
              'tipo',
              'vendedor',
              'fecha_registro'
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('pagos_detalles')
             ->join('contratos', function ($join){
                 $join->on('contratos.id', '=', 'pagos_detalles.pago_id');
             })
             ->whereBetween("pagos_detalles.created_at",[$this->fechaInicio,$this->fechaFinal])->where("pagos_detalles.cantidad",'>',0)
             ->select('pagos_detalles.fecha_pago','pagos_detalles.cantidad','pagos_detalles.concepto','contratos.poliza','contratos.tipo','contratos.vendedor_id','pagos_detalles.created_at')
             ->get();

         return $reporte;

    }
}
