<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'string|required|', 
            'lastname' => 'string|required|',
            'cedula' => 'string|required|unique:clients|max:11',
            'address' => 'string|required|',
            'phone' => 'string|required|',
            'email' => 'string|required|unique:clients|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El valor no es correcto',
            'name.required' => 'Este campo es obligatorio',

            'lastname.string' => 'El valor no es correcto',
            'lastname.required' => 'Este campo es obligatorio', 
            
            'cedula.string' => 'El valor no es correcto',
            'cedula.required' => 'Este campo es obligatorio',
            'cedula.unique' => 'Esta cedula ya fue registrada',
            'cedula.max' => 'Limite de caracteres excedido',

            'address.string' => 'El valor no es correcto',
            'address.required' => 'Este campo es obligatorio',

            'phone.string' => 'El valor no es correcto',
            'phone.required' => 'Este campo es obligatorio',

            'email.string' => 'El valor no es correcto',
            'email.required' => 'Email es obligatorio',
            'email.unique' => 'Este email ya fue registrado',
            'email.email' => 'No es un correo electronico',


            
            
        ];
    }
}
