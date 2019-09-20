<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //fillable protege al sistema de asignaciones masivas de datos e inyecciones sql.
    protected $fillable = ['numero','nombre','area_codigo'];
    protected $primaryKey = 'codigo';
    protected $attributes = [
        'visible' => true,
    ];

        public function area(){
    	return $this->belongsTo(Area::class);
    }
}
