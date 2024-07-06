<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehiculoRequest extends FormRequest
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
            'matricula' => ['required','string','min:6', 'unique:vehiculos,matricula'],
            'nombre_vehiculo' => ['required','alpha','max:20','min:3'],
            'tipo_v' => ['required','integer','min:1'],
            'marca' => ['required','string','max:20','min:3'],
            'año' => ['required','integer','min:1980','max:2024'],
            'estado' => ['required','string',Rule::in(['disponible','arrendado','en mantenimiento', 'de baja'])],
            'imagen' => ['required','image','mimes:png,jpg,jpeg',],

        ];
    }
    public function messages(): array
    {
        return [
            'matricula.required' => 'Indique la matricula del vehiculo',
            'matricula.unique' => 'La matricula del vehiculo ya existe en la base de datos',
            'matricula.min' => 'La matricula del vehiculo debe tener como minimo 6 letras',
            'nombre_vehiculo.required' => 'Indique el nombre del vehiculo',
            'nombre_vehiculo.alpha' => 'El nombre del vehiculo debe ser solo letras',
            'nombre_vehiculo.max' => 'El nombre del vehiculo debe tener como máximo 20 letras',
            'nombre_vehiculo.min' => 'El nombre del vehiculo debe tener como mínimo 3 letras',
            'tipo_v.required' => 'Indique el tipo de vehiculo',
            'tipo_v.min' => 'El tipo de vehiculo debe tener como mínimo 1',
            'marca.string' => 'La marca del vehiculo debe ser solo letras',
            'marca.required' => 'Indique la marca del vehiculo',
            'marca.max' => 'La marca del vehiculo debe tener como máximo 20 letras',
            'marca.min' => 'La marca del vehiculo debe tener como mínimo 3 letras',
            'año.required' => 'Indique el año del vehiculo',
            'año.min' => 'El año del vehiculo debe ser un número mayor a 1980',
            'año.max' => 'El año del vehiculo debe ser un número menor a 2024',
            'estado.required' => 'Indique el estado del vehiculo',
            'estado.in' => 'El estado del vehiculo debe ser disponible, arrendado, en mantenimiento o de baja',
            'imagen.required' => 'Indique la imagen del vehiculo',
            'imagen.image' => 'La imagen del vehiculo debe ser una imagen',
            'imagen.mimes' => 'La imagen del vehiculo debe ser de tipo png, jpg o jpeg',
        ];
    }
}
