<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArriendoRequest extends FormRequest
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
            'matricula_arriendo' => ['required','string','max:6', 'unique:arriendos,matricula_arriendo'],
            'rut_arrendatario' => ['required','string','max:9', 'min:7'],
            'tipo' => ['required','integer','min:1',],
            'valor_arriendo' => ['required','integer','exists:tipos,precio_tipo'],
            'fecha_inicio' => ['required','date'],
            'fecha_fin' => ['required','date'],
            'estado_arriendo' => ['required','string',Rule::in(['vigente','finalizado'])],  
            'imagen_entrega' => ['required','image','mimes:png,jpg,jpeg'],
            'imagen_recepcion' => ['required','image','mimes:png,jpg,jpeg'],

        ];
    }

    public function messages(): array
    {
        return [
            'matricula_arriendo.required' => 'Indique la matricula del vehiculo',
            'matricula_arriendo.unique' => 'La matricula del vehiculo ya existe en la base de datos',
            'matricula_arriendo.max' => 'La matricula del vehiculo debe tener como máximo 6 letras',
            'rut_arrendatario.required' => 'Indique el rut del arrendatario',
            'rut_arrendatario.min' => 'El rut del arrendatario debe tener como mínimo 7 caracteres',
            'rut_arrendatario.max' => 'El rut del arrendatario debe tener como máximo 9 caracteres',
            'tipo.required' => 'Indique el tipo de vehiculo',
            'tipo.min' => 'El tipo de vehiculo debe tener como mínimo 1',
            'valor_arriendo.required' => 'Indique el valor del arriendo',
            'valor_arriendo.exists' => 'El valor del arriendo no existe en la base de datos',
            'fecha_inicio.required' => 'Indique la fecha de inicio del arriendo',
            'fecha_fin.required' => 'Indique la fecha de fin del arriendo',
            'estado_arriendo.required' => 'Indique el estado del arriendo',
            'estado_arriendo.in' => 'El estado del arriendo debe ser vigente o finalizado',
            'imagen_entrega.required' => 'Indique la imagen de entrega',
            'imagen_entrega.image' => 'La imagen de entrega debe ser una imagen',
            'imagen_entrega.mimes' => 'La imagen de entrega debe ser de tipo png, jpg o jpeg',
            'imagen_recepcion.required' => 'Indique la imagen de recepción',
            'imagen_recepcion.image' => 'La imagen de recepción debe ser una imagen',
            'imagen_recepcion.mimes' => 'La imagen de recepción debe ser de tipo png, jpg o jpeg',
        ];
    }
}
