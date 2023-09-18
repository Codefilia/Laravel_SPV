<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,name,
            '.$this->route('product')->id.'', 

            'image' => 'required|dimensions:min_width=100,min_height=200', 
            'sell_price' => 'required|',  
            'category_id' => 'required|integer|exists:App\Models\Category,id', 
            'provider_id' => 'required|integer|exists:App\Models\Provider,id'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es el correcto',
            'name.max' => 'Solo se permiten 255 caracteres',
            'name.unique' => 'Ya esta registrado',

            'image.required' => 'La imagen es requerida',
            'image.dimensions' => 'No cumple con las dimensiones',

            'sell_price.required' => 'Este campo es requerido',

            'category.id.required' => 'Este campo es requerido',
            'category.id.integer' => 'El valor tiene que ser entero',
            'category.id.exists' => 'La categoria no existe',

            'provider_id.required' => 'Este campo es requerido',
            'provider_id.integer' => 'El valor tiene que ser entero',
            'provider_id.exists' => 'El proovedor no existe',
        ];
    }
}
