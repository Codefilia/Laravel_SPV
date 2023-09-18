<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:clients',
            'ruc_number' => 'nullable|string|max:11|min:11|unique:clients',
            'address' => 'nullable|string|max:255|unique:clients',
            'phone_number' => 'required|string|max:9|min:9|unique:clients',
            'email'=> 'nullable|email|string|max:200|email:rfc,dns|unique:clients'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string'=> 'El valor no es correcto',
            'name.max'=> 'Solo se permite 255 caracteres',

            'dni.required'=> 'Este campo es requerido',
            'dni.string'=> 'El valor no es correcto',
            'dni.max' => 'Solo se permite 8 caracteres',
            'dni.unique'=> 'Ya esta registrado',

            'email.string'=> 'El valor no es correcto',
            'email.email' => 'No es un correo electronico',
            'email.max'=> 'Solo se permite 200 caracteres',
            'email.unique'=> 'Ya esta registrado',

            'ruc_number.string'=> 'El valor no es correcto',
            'ruc_number.max'=> 'Solo se permite 200 caracteres',
            'ruc_number.min'=> 'El minimo son 11 caracteres',
            'ruc_number.unique'=> 'Ya esta registrado',

            'address.string'=> 'El valor no es correcto',
            'address.max'=> 'Solo se permite 255 caracteres',
            'address.unique'=> 'Ya esta registrado',

            'phone_number.required' => 'Este campo es requerido',
            'phone_number.string'=> 'El valor no es correcto',
            'phone_number.max'=> 'Solo se permite 9 caracteres',
            'phone_number.min'=> 'El minimo son 9 caracteres',
            'phone_number.unique'=> 'Ya esta registrado',
        ];
    }
}
