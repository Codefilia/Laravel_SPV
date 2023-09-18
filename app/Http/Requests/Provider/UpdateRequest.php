<?php

namespace App\Http\Requests\Provider;

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
            'name'=> 'required|string|max:255',

            'email'=> 'required|email|string|max:200|unique:providers,email,
            '.$this->route('provider')->id.'',

            'ruc_number' => 'required|string|max:11|min:11|unique:providers,ruc_number,
            '.$this->route('provider')->id.'',

            'address' => 'nullable|string|max:255',
            
            'phone_number' => 'required|string|max:9|min:9|unique:providers,phone_number,
            '.$this->route('provider')->id.'',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permite 255 caracteres',

            'email.required' => 'Este campo es requerido',
            'email.string' => 'El valor no es correcto',
            'email.email' => 'No es un correo electronico',
            'email.max' => 'Solo se permiten 200 caracteres',
            'email.unique' => 'Ya se encuentra registrado',

            'ruc_number.required' => 'Este campo es requerido',
            'ruc_number.string' => 'El valor no es correcto',
            'ruc_number.max' => 'Solo se permiten 11 caracteres',
            'ruc_number.min' => 'El minimo son 11 caracteres',
            'ruc_number.unique' => 'Ya se encuentra registrado',

            'address.string' => 'El valor no es correcto',
            'address.string' => 'Solo se permiten 255 caracteres',

            'phone_number.required' => 'Este campo es requerido',
            'phone_number.string' => 'El valor no es correcto',
            'phone_number.max' => 'Solo se permiten 9 caracteres',
            'phone_number.min' => 'El minimo son 9 caracteres',
            'phone_number.unique' => 'Ya se encuentra registrado'
        ];
    }
}
