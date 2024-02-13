<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'categoria' => 'required|unique:categorias|max:50',
        ];
    }
    public function messages()
    {
        return [
            'categoria.required' => 'El campo categoría es obligatorio.',
            'categoria.unique' => 'El campo categoría debe ser único.',
            'categoria.min' => 'El campo categoría debe tener al menos 50 caracteres.',
        ];
    }
}
