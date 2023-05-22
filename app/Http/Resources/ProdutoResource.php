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
        if(in_array('commentario', $request->segments())) {
            return [
                'id' => $this->id,
                'usuario_id' => $this->usuario_id,
                'usuario_name' => $this->usuario->name,
                'categoria_id' => $this->categoria_id,
                'title' => $this->title,
                'content' => $this->content,
                'photo_path' => $this->photo_path,
                'created_at' => $this->created_at,
                'commentario' => CommentarioResource::collection($this->commentario),
            ];
        }

        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'usuario_name' => $this->usuario->name,
            'categoria_id' => $this->categoria_id,
            'title' => $this->title,
            'content' => $this->content,
            'photo_path' => $this->photo_path,
            'created_at' => $this->created_at,
        ];
    }
}
