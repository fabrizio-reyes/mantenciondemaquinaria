<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\emailUser;
use App\Rules\rutValido;

class UsersCreateRequest extends FormRequest
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
            'avatar' =>'image',
            'name' => 'required',
            'apellidos' => 'required',
            'fech_de_nac' => 'required',
            'telefono' => 'required',
            'email'=>[
                'required',
                new emailUser
            ], //.$this->route('user'),
            'password' => 'required|confirmed',
            'centrodesalud_codigo' => 'required',      
            'perfiles' => 'required',
            'rut'=> ['required', new rutValido] 

        ];
    }
}
