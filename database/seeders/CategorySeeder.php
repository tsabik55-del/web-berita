<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik',     'description' => 'Produk gadget, komputer, dan barang elektronik'],
            ['name' => 'Fashion',        'description' => 'Pakaian pria, wanita, dan aksesori fashion'],
            ['name' => 'Makanan',        'description' => 'Makanan ringan, minuman, dan kebutuhan dapur'],
            ['name' => 'Olahraga',       'description' => 'Peralatan olahraga dan aksesoris fitness'],
            ['name' => 'Rumah Tangga',   'description' => 'Perabotan dan perlengkapan rumah tangga'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
