<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anoreporte extends Model
{
    use HasFactory;

    protected $fillable = ['ano'];

       //Relacion uno a muchos
       public function asignacions(){
        return $this->hasMany(Asignacion::class);
    }
}
