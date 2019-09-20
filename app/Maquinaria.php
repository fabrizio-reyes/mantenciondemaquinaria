<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    //fillable protege al sistema de asignaciones masivas de datos e inyecciones sql.
    protected $fillable = ['id_general','id_inventario','nombre','descripcion', 'estado','mantenciones_preventivas','tipo_codigo', 'centrodesalud_codigo', 'modelo', 'marca'];
    protected $primaryKey = 'codigo';


    public function tipo(){
    	return $this->belongsTo(Tipo::class);
    }


    public function convenios(){

        return $this->belongsToMany(Convenio::Class, 'maquinaria_convenio');
    }

    public function centrodesalud(){

        return $this->belongsTo(CentroDeSalud::Class);
    }

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }


    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
