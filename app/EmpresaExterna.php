<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaExterna extends Model
{
    protected $table = 'empresas_externas';
    protected $primaryKey = 'codigo';
    protected $fillable = ['razon_social', 'correo','telefono', 'ciudad', 'rut', 'direccion'];
}
