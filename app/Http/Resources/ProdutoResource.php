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
                'usuario_name' => $this->user->name,
                'categoria_id' => $this->categoria_id,
                'title' => $this->title,
                'content' => $this->content,
                'photo_path' => $this->photo_path,
                'created_at' => $this->created_at,
                'commentario' => ComentarioResource::collection($this->commentario),
            ];
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'categoria_id' => $this->categoria_id,
            'title' => $this->title,
            'content' => $this->content,
            'photo_path' => $this->photo_path,
            'created_at' => $this->created_at,
        ];
    }
}
