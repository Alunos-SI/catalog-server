<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function getAll($filter = null)
    {
        if (!$filter) {
            return $this->all();
        }

        return $this->where('content', 'LIKE', "%$filter%")->get();
    }
}