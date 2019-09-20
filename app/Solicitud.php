<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['fecha','detalle','user_id','maquinaria_codigo','estadosolicitud_codigo', 'jsg_id'];
    protected $primaryKey = 'codigo';


    public function maquinaria(){
    	return $this->belongsTo(Maquinaria::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function estadosolicitud(){
    	return $this->belongsTo(EstadoSolicitud::class);
    }


    public function tiposfallas(){

        return $this->belongsToMany(TipoFalla::Class, 'solicitud_tipo_falla');
    }


}
