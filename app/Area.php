<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['nombre','centrodesalud_codigo'];
    protected $primaryKey = 'codigo';
    protected $attributes = [
        'visible' => true,
    ];


    public function centrodesalud(){
    	return $this->belongsTo(CentroDeSalud::class);
    }

}

