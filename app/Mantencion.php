<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantencion extends Model
{
    protected $table = 'mantenciones';
    protected $fillable = ['fecha','valor','descripcion','maquinaria_codigo','empresa_externa_codigo'];
    protected $primaryKey = 'codigo';


    public function maquinaria(){
    	return $this->belongsTo(Maquinaria::class);
    }

    public function empresa_externa(){
    	return $this->belongsTo(EmpresaExterna::class);
    }
}
