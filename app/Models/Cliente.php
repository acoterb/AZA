<?php

namespace App\Models;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
       public function direccion()
  {
    return $this->belongsTo(Direccion::class,'direccions_id');
  }   


}
