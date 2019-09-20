<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFalla extends Model
{
protected $table = 'tipos_fallas';
protected $fillable = ['nombre','descripcion'];
protected $primaryKey = 'codigo';
}
