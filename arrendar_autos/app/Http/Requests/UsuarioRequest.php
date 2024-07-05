<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rut' => ['required','integer','max:9', 'min:7','unique:usuarios,rut'],
            'nombre' => ['required','alpha','min:2','max:20'],
            'n_rol' => ['required','integer','min:1','max:2'],
            'contraseña' => ['required','string','min:8','max:20'],
        ];

        
    }
    public function messages(): array
    {
        return [
            'rut.required' => 'Indique el rut del usuario',
            'rut.unique' => 'El rut del usuario ya existe en la base de datos',
            'rut.min' => 'El rut del usuario debe tener como mínimo 7 números',
            'rut.max' => 'El rut del usuario debe tener como máximo 9 números',
            'nombre.required' => 'Indique el nombre del usuario',
            'nombre.alpha' => 'El nombre del usuario debe ser solo letras',
            'nombre.min' => 'El nombre del usuario debe tener como mínimo 2 letras',
            'nombre.max' => 'El nombre del usuario debe tener como máximo 20 letras',
            'n_rol.required' => 'Indique el rol del usuario',
            'n_rol.min' => 'El rol del usuario debe ser un número entre 1 y 2',
            'n_rol.max' => 'El rol del usuario debe ser un número entre 1 y 2',
            'contraseña.required' => 'Indique la contraseña del usuario',
            'contraseña.min' => 'La contraseña del usuario debe tener como mínimo 8 letras',
            'contraseña.max' => 'La contraseña del usuario debe tener como máximo 20 letras',
        ];
    }
}
