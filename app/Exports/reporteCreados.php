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
              'status',
              'nombre cliente',
              'apellidos cliente',
              'direccion',
              'colonia',
              'cruces',
              'estado domicilio',
              'ciudad',
              'telefono',
              'tipo',
              'vendedor',
              'a cuantos pagos',
              'pagos Realizados',
              'fecha_que_inicia_poliza',
              'tipo Vehiculo',
              'marca',
              'Sub Marca',
              'Modelo',
              'Servicio',
              'Color',
              'Estado placas',
              'No# Serie',
              'No# Registro',
              'No# Motor',
        
              'Placas',
              'Observaciones poliza'
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('contratos')
            
                ->leftJoin('clientes', function ($join){
                 $join->on('clientes.id', '=', 'contratos.cliente_id');
             }) 
             ->leftJoin('direccions', function ($join){
                 $join->on('clientes.direccions_id', '=', 'direccions.id');
             })
              ->leftJoin('pagos', function ($join){
                 $join->on('pagos.contrato_id', '=', 'contratos.id');
             })
              ->leftJoin('vehiculos', function ($join){
                 $join->on('vehiculos.id', '=', 'contratos.vehiculo_id');
             })

             ->whereBetween("contratos.desde",[$this->fechaInicio,$this->fechaFinal])
             ->select('pagos.costoservicio','contratos.poliza','contratos.status_id','clientes.nombres','clientes.apellidos','direccions.calle','direccions.colonia',
             'direccions.cruzes','direccions.estado as estado_dir','direccions.ciudad','clientes.telefono','contratos.tipo AS tipo_poliza','contratos.vendedor_id',
             'pagos.numeropagos','pagos.pagosrealizados','contratos.desde','vehiculos.tipo AS tipo_vehiculo','vehiculos.marca','vehiculos.submarca','vehiculos.modelo','vehiculos.servicio','vehiculos.color'
             ,'vehiculos.estado','vehiculos.nserie','vehiculos.nregistro','vehiculos.nmotor','vehiculos.placas','contratos.observaciones')->distinct()->get();

         return $reporte;

    }
}
