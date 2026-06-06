<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'image'];

    /**
     * Article milik satu Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Article milik satu User (penulis).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
