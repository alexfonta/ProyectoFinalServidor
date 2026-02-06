<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:30|min:1',
            'description' => 'required|string',
            'location' => 'required|string',
            'map' => 'nullable|string',
            'date' => 'nullable|date',
            'hour' => 'required|date_format:H:i:s',
            'type' => 'required|in:official,exhibition,charity',
            'tags' => 'nullable|string',
            'visible' => 'nullable|boolean'
        ];
    }

    public function messages() {

    return [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser una cadena de texto.',
        'name.max' => 'El nombre no puede tener más de 30 caracteres.',
        'name.min' => 'El nombre debe tener al menos 1 carácter.',

        'description.required' => 'La descripción es obligatoria.',
        'description.string' => 'La descripción debe ser texto.',

        'location.required' => 'La ubicación es obligatoria.',
        'location.string' => 'La ubicación debe ser texto.',

        'map.string' => 'El mapa debe ser texto.',

        'date.date' => 'La fecha no es válida.',

        'hour.required' => 'La hora es obligatoria.',
        'hour.date_format' => 'La hora debe tener el formato HH:MM:SS.',

        'type.required' => 'El tipo es obligatorio.',
        'type.in' => 'El tipo seleccionado no es válido.',

        'tags.string' => 'Las etiquetas deben ser texto.',

        'visible.boolean' => 'El campo visible debe ser verdadero o falso.',
    ];
}

}
