<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporteusuario extends Model
{
    use HasFactory;

    
    protected $fillable = ['plan','real','user_id'];

      //Relacion uno a uno inversa
      public function usuario(){
        return $this->belongsTo(User::class);
    }
}
