<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
protected $table = 'estado_solicituds';
protected $fillable = ['nombre','descripcion'];
protected $primaryKey = 'codigo';
}
