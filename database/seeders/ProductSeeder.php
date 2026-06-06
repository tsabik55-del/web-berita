<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Membuat 20 produk (4 per kategori) dan attach 2–4 tag secara random.
     * Category di-lookup by name agar tidak bergantung pada hardcoded ID.
     */
    public function run(): void
    {
        // Ambil semua kategori & tag yang sudah di-seed
        $categories = Category::pluck('id', 'name'); // ['Elektronik' => 1, ...]
        $allTags    = Tag::all();

        $products = [
            // Elektronik
            ['category' => 'Elektronik', 'name' => 'Laptop ASUS VivoBook',     'price' => 8500000, 'stock' => 10,  'description' => 'Laptop tipis bertenaga AMD Ryzen 5, cocok untuk pelajar dan profesional.'],
            ['category' => 'Elektronik', 'name' => 'Smartphone Samsung A55',   'price' => 5000000, 'stock' => 20,  'description' => 'Smartphone mid-range dengan kamera 50MP dan baterai 5000mAh.'],
            ['category' => 'Elektronik', 'name' => 'Earphone TWS Sony',        'price' =>  350000, 'stock' => 50,  'description' => 'True wireless earphone dengan active noise cancellation.'],
            ['category' => 'Elektronik', 'name' => 'Smart TV 32 Inch Android', 'price' => 2500000, 'stock' =>  5,  'description' => 'LED TV Android 11, mendukung streaming YouTube & Netflix.'],

            // Fashion
            ['category' => 'Fashion', 'name' => 'Kaos Polos Premium',          'price' =>  75000, 'stock' => 100, 'description' => 'Kaos bahan cotton combed 30s, adem dan nyaman dipakai sehari-hari.'],
            ['category' => 'Fashion', 'name' => 'Kemeja Flanel Pria',          'price' => 135000, 'stock' =>  30, 'description' => 'Kemeja flanel motif kotak-kotak, bahan tebal dan hangat.'],
            ['category' => 'Fashion', 'name' => 'Celana Jeans Slim Fit',       'price' => 185000, 'stock' =>  40, 'description' => 'Celana jeans pria slim fit, elastis dan tidak mudah kusut.'],
            ['category' => 'Fashion', 'name' => 'Jaket Hoodie Fleece',         'price' => 220000, 'stock' =>  15, 'description' => 'Hoodie tebal berbahan fleece, cocok untuk musim hujan.'],

            // Makanan
            ['category' => 'Makanan', 'name' => 'Keripik Singkong Pedas',     'price' =>  18000, 'stock' => 200, 'description' => 'Keripik singkong rasa pedas level 5, renyah dan gurih.'],
            ['category' => 'Makanan', 'name' => 'Cokelat Batang Susu',        'price' =>  28000, 'stock' =>  50, 'description' => 'Cokelat susu premium dengan tambahan almond pilihan.'],
            ['category' => 'Makanan', 'name' => 'Kopi Arabika Gayo',          'price' =>  85000, 'stock' =>  25, 'description' => 'Biji kopi arabika asli Gayo, roasted medium untuk cita rasa terbaik.'],
            ['category' => 'Makanan', 'name' => 'Teh Melati Wangi',           'price' =>  12000, 'stock' => 100, 'description' => 'Teh celup melati, harum alami dan menyegarkan.'],

            // Olahraga
            ['category' => 'Olahraga', 'name' => 'Sepatu Running Nike',       'price' => 650000, 'stock' =>  20, 'description' => 'Sepatu lari ringan dengan sol anti-slip dan bantalan empuk.'],
            ['category' => 'Olahraga', 'name' => 'Raket Badminton Yonex',     'price' => 450000, 'stock' =>  15, 'description' => 'Raket karbon ultraringan, cocok untuk pemain menengah hingga profesional.'],
            ['category' => 'Olahraga', 'name' => 'Dumbbell 5kg Pair',         'price' => 120000, 'stock' =>  30, 'description' => 'Dumbbell rubber coated 5kg sepasang, aman untuk latihan di rumah.'],
            ['category' => 'Olahraga', 'name' => 'Matras Yoga 6mm',           'price' =>  95000, 'stock' =>  25, 'description' => 'Matras yoga anti-slip 6mm, ringan dan mudah digulung.'],

            // Rumah Tangga
            ['category' => 'Rumah Tangga', 'name' => 'Panci Stainless 24cm',  'price' =>  85000, 'stock' =>  40, 'description' => 'Panci stainless steel tebal, anti karat dan mudah dibersihkan.'],
            ['category' => 'Rumah Tangga', 'name' => 'Rak Dinding Serbaguna', 'price' =>  55000, 'stock' =>  60, 'description' => 'Rak dinding minimalis bahan kayu MDF, cocok untuk dekorasi rumah.'],
            ['category' => 'Rumah Tangga', 'name' => 'Lampu LED Philips 12W', 'price' =>  35000, 'stock' =>  80, 'description' => 'Lampu LED hemat energi 12W, cahaya putih terang tahan lama.'],
            ['category' => 'Rumah Tangga', 'name' => 'Sapu Lantai + Pengki',  'price' =>  25000, 'stock' =>  50, 'description' => 'Sapu bulu halus dengan pengki plastik, set lengkap untuk kebersihan rumah.'],
        ];

        foreach ($products as $prod) {
            $categoryId = $categories[$prod['category']];

            $product = Product::create([
                'category_id' => $categoryId,
                'name'        => $prod['name'],
                'description' => $prod['description'],
                'price'       => $prod['price'],
                'stock'       => $prod['stock'],
                'is_active'   => true,
            ]);

            // Attach 2–4 tag secara random
            $randomTagIds = $allTags->random(rand(2, 4))->pluck('id');
            $product->tags()->attach($randomTagIds);
        }
    }
}
