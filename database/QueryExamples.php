<?php
// File ini dibuat sebagai referensi jawaban Tugas 3 - Query Eloquent Lanjutan
// Anda dapat mengujinya melalui `php artisan tinker`

use App\Models\Product;
use App\Models\Category;

/* ==============================================================================
   1. Tampilkan 5 produk dengan harga tertinggi beserta nama kategorinya.
============================================================================== */
$topProducts = Product::with('category')
    ->orderBy('price', 'desc')
    ->take(5)
    ->get();

foreach ($topProducts as $product) {
    echo "Produk: {$product->name} | Harga: Rp " . number_format($product->price, 0, ',', '.') . " | Kategori: {$product->category->name}\n";
}


/* ==============================================================================
   2. Tampilkan jumlah produk per kategori.
============================================================================== */
$categories = Category::withCount('products')->get();

foreach ($categories as $category) {
    echo "Kategori: {$category->name} memiliki {$category->products_count} produk.\n";
}


/* ==============================================================================
   3. Tampilkan semua produk yang memiliki tag 'promo' dan stok > 0.
============================================================================== */
$promoProducts = Product::whereHas('tags', function ($query) {
        $query->where('name', 'promo');
    })
    ->where('stock', '>', 0)
    ->get();

foreach ($promoProducts as $product) {
    echo "Produk Promo Tersedia: {$product->name} (Stok: {$product->stock})\n";
}
