<?php

namespace App\Exports;

use App\Models\Pagos_detalles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class reporteCreados implements FromCollection,WithHeadings
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
              'costo total',
              'poliza',
              'tipo',
              'vendedor',
              'a cuantos pagos',
              'pagos Realizados',
              'fecha_que_inicia_poliza'
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('contratos')
            
                ->leftJoin('pagos', function ($join){
                 $join->on('pagos.contrato_id', '=', 'contratos.id');
             })
             ->whereBetween("contratos.desde",[$this->fechaInicio,$this->fechaFinal])
             ->select('pagos.costoservicio','contratos.poliza','contratos.tipo','contratos.vendedor_id','pagos.numeropagos','pagos.pagosrealizados','contratos.desde')->distinct()->get();

         return $reporte;

    }
}
