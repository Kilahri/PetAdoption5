<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Dog'],
            ['category_name' => 'Cat'],
            ['category_name' => 'Other'],
        ];

        // Use upsert to avoid duplicates
        DB::table('categories')->upsert($categories, ['category_name']);
    }
}
