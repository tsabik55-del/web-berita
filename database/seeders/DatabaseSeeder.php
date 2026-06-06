<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Truncate tabel seed data terlebih dahulu agar seeder bisa
     * dijalankan ulang (idempotent) tanpa duplikasi.
     * Tabel users, orders, dll TIDAK disentuh.
     */
    public function run(): void
    {
        // Matikan sementara foreign key check agar truncate tidak error
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('product_tag')->truncate();
        DB::table('products')->truncate();
        DB::table('tags')->truncate();
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Jalankan seeder secara berurutan
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
