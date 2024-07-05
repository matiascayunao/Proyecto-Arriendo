<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoRequest extends FormRequest
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
            'tipo_vehiculo' => ['required','string','max:20'],
            'precio_tipo' => ['required','integer','min:30000','max:1000000'],

        ];

        
    }
    public function messages(): array
    {
        return [
            'tipo_vehiculo.required' => 'Indique el tipo de vehiculo',
            'tipo_vehiculo.max' => 'El tipo de vehiculo debe tener como máximo 20 letras',
            'precio_tipo.required' => 'Indique el precio del tipo de vehiculo',
            'precio_tipo.min' => 'El precio del tipo de vehiculo debe ser un número mayor a 30000',
            'precio_tipo.max' => 'El precio del tipo de vehiculo debe ser un número menor a 1000000',
        ];
    }
}