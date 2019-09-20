<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['rut','nombre','apellidos','correo','fecha_nacimiento','cargo','area_codigo','perfil_codigo']; 
    protected $primaryKey = 'codigo';


        protected $attributes = [
        'visible' => true,
    ];
}
