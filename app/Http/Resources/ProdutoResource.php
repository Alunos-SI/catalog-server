<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(in_array('comentario', $request->segments())) {
            return [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'categoria_id' => $this->categoria_id,
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'valor' => $this->valor,
                'created_at' => $this->created_at,
            ];
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'categoria_id' => $this->categoria_id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'created_at' => $this->created_at,
        ];
    }
}
