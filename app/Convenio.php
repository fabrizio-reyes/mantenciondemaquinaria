<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
        protected $fillable = ['id_convenio','empresaexterna_codigo' ,'fecha_inicio','fecha_termino', 'visible'];
    protected $primaryKey = 'codigo';


        protected $attributes = [
        'visible' => true,
    ];


    public function empresaexterna(){
    	return $this->belongsTo(EmpresaExterna::class);
    }

    public function maquinarias(){

        return $this->belongsToMany(Maquinaria::Class, 'maquinaria_convenio');
    }


     public function vigencia(){

        $date = Carbon::today();
        if ($this->fecha_inicio>$date) {
            return false;
        }
        if ($this->fecha_termino==null) {
            return true;
        }
        if ($this->fecha_termino>$date) {
            return true;
        }
        return false;
    }

}
