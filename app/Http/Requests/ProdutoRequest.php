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
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categorias,id',
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'photo_path' => 'nullable',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
            'nome' => 'required|string'
        ];
    }
}
