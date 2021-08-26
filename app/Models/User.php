<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */


      //Relaion uno a muhos inversa
      public function region(){
        return $this->belongsTo(Region::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }

    //Relacion uno a muchos
    public function asignacions(){
        return $this->hasMany(Asignacion::class);
    }

    //Relación uno a uno
    public function reporteusuario(){
        return $this->hasOne(Reporteusuario::class);
    }


}