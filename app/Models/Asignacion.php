<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','objestrategico_id','objtactico_id','objoperacional_id','fecha_conformacion_i','fecha_recopilacion_i','fecha_inf_i','fecha_divulgacion_i','fecha_carga_i','fecha_creacion'];


    public function SetFechaConformacionIAttribute($value)
    {
   
      $this->attributes['fecha_conformacion_i'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function SetFechaRecopilacionIAttribute($value)
    {
 
      $this->attributes['fecha_recopilacion_i'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function SetFechaInfIAttribute($value)
    {
      $this->attributes['fecha_inf_i'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function SetFechaDivulgacionIAttribute($value)
    {
      $this->attributes['fecha_divulgacion_i'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function SetFechaCargaIAttribute($value)
    {
      $this->attributes['fecha_carga_i'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

       //Relacion uno a muchos inversa
       public function objtactico(){
        return $this->belongsTo(Objtactico::class);
        }
        public function objoperacional(){
            return $this->belongsTo(Objoperacional::class);
        }
        public function objestrategico(){
            return $this->belongsTo(Objestrategico::class);
        }
        public function anoreporte(){
          return $this->belongsTo(Anoreporte::class);
      }

        //Relación uno a uno
        public function avance(){
          return $this->hasOne(Avance::class);
      }

         //Relacion uno a muchos inversa
       public function user(){
        return $this->belongsTo(User::class);
        }

           //Relacion uno a muchos
       public function reporteplans(){
          return $this->hasMany(Reporteplan::class);
      }
      public function reportereals(){
        return $this->hasMany(Reportereal::class);
    }

        
}

