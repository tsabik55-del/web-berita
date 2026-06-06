<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Satu Category memiliki banyak Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Satu Category memiliki banyak Article.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
