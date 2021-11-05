<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
                'code' => 'required|string|unique:products|',
                'descripcion' => 'required|string|unique:products',
                'precio' => 'required|',
                'stock' => 'required|'
                
            ];
        }
    
        public function messages()
        {
            return [
                'code.required' => 'Este campo es requerido',
                'code.string' => 'El valor no es correcto',
                'code.unique' => 'El producto ya esta registrado',
    
    
                'descripcion.required' => 'Este campo es requerido',
                'descripcion.string' => 'El valor no es correcto',
                'descripcion.unique' => 'El producto ya esta registrado',
    
    
                'precio.required' => 'Este campo es requerido',
    
    
                'stock.required' => 'Este campo es requerido',
            
            ];
        }
}
