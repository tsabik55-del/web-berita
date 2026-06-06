<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['product_id', 'name', 'email', 'comment', 'is_approved'];

    /**
     * Comment belongs to a Product (Berita).
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
