<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'description',
        'price', 'stock', 'is_active',
    ];

    // Cast tipe data secara otomatis
    protected $casts = [
        'price'     => 'decimal:2',
        'is_active' => 'boolean',
        'stock'     => 'integer',
    ];

    /**
     * Product ini milik satu Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product memiliki banyak Tag.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Product (Berita) has many Comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
