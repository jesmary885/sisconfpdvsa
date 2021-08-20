<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportenegocio extends Model
{
    use HasFactory;

    protected $fillable = ['plan','real','negocio_id'];

      //Relacion uno a uno inversa
      public function negocio(){
        return $this->belongsTo(Negocio::class);
    }
}
