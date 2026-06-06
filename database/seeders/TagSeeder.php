<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Hanya membuat 10 tag — attach ke produk dilakukan di ProductSeeder.
     */
    public function run(): void
    {
        $tags = [
            'promo',
            'baru',
            'bestseller',
            'limited',
            'diskon',
            'flash-sale',
            'premium',
            'lokal',
            'impor',
            'gratis-ongkir',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
