<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'categoria_id' => 'required|numeric|exists:categorias,id',
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'photo_path' => 'nullable',
            'imagem' => 'sometimes|file|max:5000|mimes:jpeg,png,jpg',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
            'nome' => 'required|string'
        ];
    }
}
