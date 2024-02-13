<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
        $id = $this->route('categoria') ? $this->route('categoria')->id : null;
        return [
            'categoria' => 'required|unique:categorias,categoria,' . $id . '|max:50',
        ];
    }
    public function messages()
    {
        return [
            'categoria.required' => 'El campo categoría es obligatorio.',
            'categoria.unique' => 'El campo categoría debe ser único.',
            'categoria.max' => 'El campo categoría no puede tener más de 50 caracteres.',
        ];
    }
}
