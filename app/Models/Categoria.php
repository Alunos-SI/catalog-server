<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the posts for the category.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getAll($filter = null)
    {
        if (!$filter) {
            return $this->all();
        }

        return $this->where('name', 'LIKE', "%$filter%")->get();
    }
}
