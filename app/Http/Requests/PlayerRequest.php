<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'name' => 'min:3|max:15|required',
            'twitter' => 'min:3|max:30|nullable',
            'instagram' => 'min:3|max:30|nullable',
            'twitch' => 'min:3|max:30|nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'visible' => 'nullable|boolean',
            'age' => 'required|numeric',
            'role' => 'min:3|max:15|required'
        ];
    }

    public function messages() {
        return [
            'name.min' => 'El nombre debe tener almenos 3 caracteres',
            'name.max' => 'El nombre debe tener como máximo 15 caracteres',
            'twitter.min' => 'El twitter debe tener almenos 3 caracteres',
            'instagram.min' => 'El instagram debe tener almenos 3 caracteres',
            'twitch.min' => 'El twitch debe tener almenos 3 caracteres',
            'twitter.max' => 'El twitter debe tener como máximo 30 caracteres' ,
            'instagram.max' => 'El instagram debe tener como máximo 30 caracteres' ,
            'twitch.max' => 'El twitch debe tener como máximo 30 caracteres' ,
            'age.required' => 'La edad es obligatoria',
            'age.numeric' => 'La edad debe ser numérica',
            'role.min' => 'El rol debe tener como mínimo 3 caracteres',
            'role.max' => 'El rol debe tener como máximo 15 caracteres',
            'role.required' => 'El rol es obligatorio',
        ];
    }
}
