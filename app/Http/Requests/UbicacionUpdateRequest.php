<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbicacionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha_llegada' => 'required',
            'fecha_ida' => 'required',
            'maquinaria_codigo' => 'required',
            'centrodesalud_codigo'=> 'required',
            'sala_codigo'=> 'required',
            'area_codigo'=> 'required'
            
        ];
    }
}
