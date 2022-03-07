<?php

namespace App\Models;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cobradore extends Model
{
    use SoftDeletes;
        public function zonas()
    {
      return $this->belongsTo(Zona::class,'zona_id');
    }

}
