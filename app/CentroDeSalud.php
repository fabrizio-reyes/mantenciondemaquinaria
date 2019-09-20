<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroDeSalud extends Model
{
    protected $table = 'centrodesalud';
    protected $primaryKey = 'codigo';
    protected $fillable = ['nombre','descripcion', 'correo','telefono','ciudad', 'direccion'];
}
