<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = Product::all();

        $comments = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'comment' => 'Artikel yang sangat informatif dan mendalam. Terima kasih atas ulasannya!',
                'is_approved' => true,
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti@yahoo.com',
                'comment' => 'Saya kurang setuju dengan poin kedua, tapi secara keseluruhan tulisan ini sangat bagus.',
                'is_approved' => true,
            ],
            [
                'name' => 'Rian Hidayat',
                'email' => 'rian@gmail.com',
                'comment' => 'Bermanfaat sekali! Izin share artikel ini ya min.',
                'is_approved' => true,
            ],
            [
                'name' => 'Spammer Jahat',
                'email' => 'spam@bot.com',
                'comment' => 'Kunjungi link judi online slot gacor terpercaya 2026!',
                'is_approved' => false,
            ]
        ];

        foreach ($comments as $commentData) {
            $commentData['product_id'] = $products->isNotEmpty() ? $products->random()->id : null;
            Comment::create($commentData);
        }
    }
}
