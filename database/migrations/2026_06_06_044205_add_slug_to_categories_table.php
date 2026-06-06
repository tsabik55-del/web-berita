<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // Add slug as nullable first if it doesn't exist yet
        if (!Schema::hasColumn('categories', 'slug')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name');
            });
        }

        // Populate existing records
        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            DB::table('categories')
                ->where('id', $category->id)
                ->update(['slug' => Str::slug($category->name)]);
        }

        // Add the unique constraint
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
