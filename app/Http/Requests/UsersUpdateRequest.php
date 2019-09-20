<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\rutValido;
use App\Rules\emailUser;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'centrodesalud_codigo' => 'required',
            'fech_de_nac' => 'required',
            'avatar' =>'image',
            'email'=>'required|unique:users,email,'.$this->route('user'),      //unique:users,email' . $this->route('user')
            
            'rut'=> ['required', new rutValido]

        ];
    }
}
