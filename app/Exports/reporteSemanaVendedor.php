<?php

namespace App\Exports;

use App\Models\Pagos_detalles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class reporteSemanaVendedor implements FromCollection,WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */

    public function __construct(string $fechaInicio,string $fechaFinal,string $vendedor)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        $this->vendedor = $vendedor;

    }

    public function headings(): array
    {
          return [
              'poliza',
              'tipo',
              'vendedor',
              'a cuantos pagos',
              'fecha_registro'
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('contratos')
           ->join('pagos', function ($join){
                 $join->on('pagos.contrato_id', '=', 'contratos.id');
             })
             ->where("contratos.vendedor_id",$this->vendedor)
             ->whereBetween("contratos.desde",[$this->fechaInicio,$this->fechaFinal])->select('contratos.poliza','contratos.tipo','contratos.vendedor_id','pagos.numeropagos','contratos.desde')
             ->get();

         return $reporte;

    }
}
