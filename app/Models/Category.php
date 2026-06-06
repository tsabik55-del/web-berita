<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = ['name', 'description'];

    /**
     * Satu Category memiliki banyak Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
