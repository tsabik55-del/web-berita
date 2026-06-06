<?php

namespace App\Queries;

use App\Models\Product;
use App\Models\Category;

/**
 * EloquentExamples — Tugas 3
 *
 * Kumpulan contoh query Eloquent sebagai referensi.
 * File ini tidak dieksekusi secara langsung; gunakan `php artisan tinker`
 * untuk menguji masing-masing method.
 */
class EloquentExamples
{
    /**
     * Query 1: Tampilkan 5 produk dengan harga tertinggi beserta nama kategorinya.
     *
     * Menggunakan:
     *  - with('category')  → eager load relasi category (menghindari N+1 query)
     *  - orderBy('price', 'desc') → urutkan dari harga tertinggi
     *  - take(5)           → ambil 5 data saja
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function topFiveExpensiveProducts()
    {
        return Product::with('category')
            ->orderBy('price', 'desc')
            ->take(5)
            ->get();

        // Contoh penggunaan hasil query:
        // foreach ($results as $product) {
        //     echo $product->name . ' — Rp' . number_format($product->price, 0, ',', '.');
        //     echo ' | Kategori: ' . $product->category->name;
        // }
    }

    /**
     * Query 2: Tampilkan jumlah produk per kategori.
     *
     * Menggunakan:
     *  - withCount('products') → menambahkan kolom virtual `products_count`
     *    berisi jumlah produk yang berelasi dengan setiap kategori
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function productCountPerCategory()
    {
        return Category::withCount('products')->get();

        // Contoh penggunaan hasil query:
        // foreach ($results as $category) {
        //     echo $category->name . ': ' . $category->products_count . ' produk';
        // }
    }

    /**
     * Query 3: Tampilkan semua produk yang memiliki tag 'promo' dan stok > 0.
     *
     * Menggunakan:
     *  - whereHas('tags', fn) → filter produk yang memiliki relasi tag
     *    dengan kondisi name = 'promo'
     *  - where('stock', '>', 0) → pastikan produk masih tersedia
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function promoProductsInStock()
    {
        return Product::whereHas('tags', function ($query) {
                $query->where('name', 'promo');
            })
            ->where('stock', '>', 0)
            ->get();

        // Contoh penggunaan hasil query:
        // foreach ($results as $product) {
        //     echo $product->name . ' — Stok: ' . $product->stock;
        // }
    }
}
