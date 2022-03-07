<?php

namespace App\Models;
use App\Models\Cliente;
use App\Models\Vehiculos;
use App\Models\Licencia;
use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
     public function contrato()
  {
    return $this->belongsTo(Cliente::class,'cliente_id');
  }
        public function vehiculo()
    {
      return $this->belongsTo(Vehiculos::class,'vehiculo_id');
    }
            public function licencia()
    {
      return $this->belongsTo(Licencia::class,'licencia_id');
    }
}
