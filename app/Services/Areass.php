<?php

namespace App\Services;

use App\Area;

Class Areass{

	public function get(){
		$areas = Area::all();
		$areasArray[''] = 'Selecciona un Área';
		foreach ($areas as $area){
			$areasArray[$area->codigo] = $area->nombre;
		}

		return $areasArray;
	}

}