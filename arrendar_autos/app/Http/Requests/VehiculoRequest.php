<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'matricula' => ['required','string','max:6', 'unique:vehiculos,matricula'],
            'nombre_vehiculo' => ['required','string','max:20','min:6'],
            'tipo_v' => ['required','string','max:20','min:6'],
            'marca' => ['required','string','max:20','min:6'],
            'año' => ['required','integer','min:1980','max:2024'],
            'estado' => ['required','string',Rule::in(['disponible','arrendado','en mantenimiento', 'de baja'])],
            'imagen' => ['required','image','mimes:png,jpg,jpeg','max:2048','dimensions:ratio=4/3'],

        ];
    }
    public function messages(): array
    {
        return [
            'matricula.required' => 'Indique la matricula del vehiculo',
            'matricula.unique' => 'La matricula del vehiculo ya existe en la base de datos',
            'matricula.max' => 'La matricula del vehiculo debe tener como máximo 6 letras',
            'nombre_vehiculo.required' => 'Indique el nombre del vehiculo',
            'nombre_vehiculo.max' => 'El nombre del vehiculo debe tener como máximo 20 letras',
            'nombre_vehiculo.min' => 'El nombre del vehiculo debe tener como mínimo 6 letras',
            'tipo_v.required' => 'Indique el tipo de vehiculo',
            'tipo_v.max' => 'El tipo de vehiculo debe tener como máximo 20 letras',
            'tipo_v.min' => 'El tipo de vehiculo debe tener como mínimo 6 letras',
            'marca.required' => 'Indique la marca del vehiculo',
            'marca.max' => 'La marca del vehiculo debe tener como máximo 20 letras',
            'marca.min' => 'La marca del vehiculo debe tener como mínimo 6 letras',
            'año.required' => 'Indique el año del vehiculo',
            'año.min' => 'El año del vehiculo debe ser un número mayor a 1980',
            'año.max' => 'El año del vehiculo debe ser un número menor a 2024',
            'estado.required' => 'Indique el estado del vehiculo',
            'estado.in' => 'El estado del vehiculo debe ser disponible, arrendado, en mantenimiento o de baja',
            'imagen.required' => 'Indique la imagen del vehiculo',
            'imagen.image' => 'La imagen del vehiculo debe ser una imagen',
            'imagen.mimes' => 'La imagen del vehiculo debe ser de tipo png, jpg o jpeg',
            'imagen.max' => 'La imagen del vehiculo debe tener un tamaño máximo de 2048 KB',
            'imagen.dimensions' => 'La imagen del vehiculo debe tener una relación de aspecto de 4:3',
        ];
    }
}
