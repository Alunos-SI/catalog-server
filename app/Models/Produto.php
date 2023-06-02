<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'photo_path',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the post.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }

    public function getAll($filter = null)
    {
        if (!$filter) {
            return $this->paginate();
        }

        return $this->where('title', 'LIKE', "%$filter%")
        ->orWhere('content', 'LIKE', "%$filter%")
        ->paginate();
    }
}
