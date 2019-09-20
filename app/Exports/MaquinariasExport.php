<?php

namespace App\Exports;

use App\Maquinaria;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaquinariasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Maquinaria::all();
    }
}
