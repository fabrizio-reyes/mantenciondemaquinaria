<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    //fillable protege al sistema de asignaciones masivas de datos e inyecciones sql.
    protected $table = 'ubicaciones';
    protected $fillable = ['fecha_llegada','fecha_ida','maquinaria_codigo','centrodesalud_codigo', 'sala_codigo','area_codigo'];
    protected $primaryKey = 'codigo';
    protected $attributes = [
        'visible' => true,

    ];

    public function maquinaria(){
    	return $this->belongsTo(Maquinaria::class);
    }

    public function sala(){
    	return $this->belongsTo(Sala::class);
    }

    public function area(){
    	return $this->belongsTo(Area::class);
    }

    public function centrodesalud(){
    	return $this->belongsTo(CentroDeSalud::class);
    }
}
