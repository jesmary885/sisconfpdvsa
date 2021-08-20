<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportedivision extends Model
{
    use HasFactory;

    protected $fillable = ['plan','real','division_id'];

    
     //Relacion uno a uno inversa
     public function division(){
        return $this->belongsTo(Division::class);
    }
}
