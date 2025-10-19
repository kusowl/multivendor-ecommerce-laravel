<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 categories
        Category::factory()
            ->count(10)
            ->create()
            ->each(function ($category) {
                // For each category, create 20 subcategories
                SubCategory::factory()
                    ->count(20)
                    ->create(['category_id' => $category->id]);
            });
    }
}
