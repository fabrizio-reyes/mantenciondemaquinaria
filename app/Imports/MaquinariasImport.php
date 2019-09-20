<?php

namespace App\Imports;

use App\Maquinaria;
use Maatwebsite\Excel\Concerns\ToModel;

class MaquinariasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Maquinaria([
            'id_general' => $row[0],
            'id_inventario' => $row[1],
            'nombre' => $row[2],
            'descripcion' => $row[3],
             'estado' => $row[4],
            'mantenciones_preventivas' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
            'tipo_codigo' => $row[6],
            'visible' => $row[7],
            'created_at' => $row[8],
             'update_at' => $row[9],
        ]);
    }
}