<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FallaSolicitud extends Model
{
    protected $table = 'solicitud_tipo_falla';
    protected $fillable = ['detalle','solicitud_codigo','tipofalla_codigo'];
    protected $primaryKey = 'codigo';
}
