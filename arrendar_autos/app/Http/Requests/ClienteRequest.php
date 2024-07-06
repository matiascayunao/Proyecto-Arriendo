<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'rut_cliente' => ['required','integer','max:9', 'min:7','unique:clientes,rut_cliente'],
            'nombre_cliente' => ['required','alpha','min:2','max:20'],
            'apellido_cliente' => ['required','alpha','min:2','max:20'],
        ];  
    }
    public function messages(): array
    {
        return [
            'rut_cliente.required' => 'Indique el rut del cliente',
            'rut_cliente.unique' => 'El rut del cliente ya existe en la base de datos',
            'rut_cliente.min' => 'El rut del cliente debe tener como mínimo 7 números',
            'rut_cliente.max' => 'El rut del cliente debe tener como máximo 9 números',
            'nombre_cliente.required' => 'Indique el nombre del cliente',
            'nombre_cliente.alpha' => 'El nombre del cliente debe ser solo letras',
            'nombre_cliente.min' => 'El nombre del cliente debe tener como mínimo 2 letras',
            'nombre_cliente.max' => 'El nombre del cliente debe tener como máximo 20 letras',
            'apellido_cliente.required' => 'Indique el apellido del cliente',
            'apellido_cliente.alpha' => 'El apellido del cliente debe ser solo letras',
            'apellido_cliente.min' => 'El apellido del cliente debe tener como mínimo 2 letras',
            'apellido_cliente.max' => 'El apellido del cliente debe tener como máximo 20 letras',

        ];
    }
}
