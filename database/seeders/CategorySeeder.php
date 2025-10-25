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
        Subcategory::truncate();
        Category::truncate();

        // Define categories and subcategories
        $categories = [
            [
                'name' => "Men's Clothing",
                'slug' => 'mens-clothing',
                'image' => 'https://picsum.photos/seed/men-clothing/400/300',
                'subcategories' => [
                    ['name' => 'T-Shirts', 'slug' => 'mens-tshirts'],
                    ['name' => 'Jeans', 'slug' => 'mens-jeans'],
                    ['name' => 'Formal Shirts', 'slug' => 'mens-formal-shirts'],
                    ['name' => 'Jackets', 'slug' => 'mens-jackets'],
                    ['name' => 'Shorts', 'slug' => 'mens-shorts'],
                ],
            ],
            [
                'name' => "Women's Clothing",
                'slug' => 'womens-clothing',
                'image' => 'https://picsum.photos/seed/women-clothing/400/300',
                'subcategories' => [
                    ['name' => 'Dresses', 'slug' => 'womens-dresses'],
                    ['name' => 'Tops', 'slug' => 'womens-tops'],
                    ['name' => 'Skirts', 'slug' => 'womens-skirts'],
                    ['name' => 'Blouses', 'slug' => 'womens-blouses'],
                    ['name' => 'Leggings', 'slug' => 'womens-leggings'],
                ],
            ],
            [
                'name' => 'Footwear',
                'slug' => 'footwear',
                'image' => 'https://picsum.photos/seed/footwear/400/300',
                'subcategories' => [
                    ['name' => "Men's Shoes", 'slug' => 'mens-shoes'],
                    ['name' => "Women's Shoes", 'slug' => 'womens-shoes'],
                    ['name' => 'Sneakers', 'slug' => 'sneakers'],
                    ['name' => 'Sandals', 'slug' => 'sandals'],
                ],
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'image' => null,
                'subcategories' => [
                    ['name' => 'Belts', 'slug' => 'belts'],
                    ['name' => 'Hats', 'slug' => 'hats'],
                    ['name' => 'Sunglasses', 'slug' => 'sunglasses'],
                    ['name' => 'Scarves', 'slug' => 'scarves'],
                ],
            ],
            [
                'name' => 'Jewelry',
                'slug' => 'jewelry',
                'image' => 'https://picsum.photos/seed/jewelry/400/300',
                'subcategories' => [
                    ['name' => 'Necklaces', 'slug' => 'necklaces'],
                    ['name' => 'Earrings', 'slug' => 'earrings'],
                    ['name' => 'Rings', 'slug' => 'rings'],
                    ['name' => 'Bracelets', 'slug' => 'bracelets'],
                    ['name' => 'Watches', 'slug' => 'watches'],
                ],
            ],
            [
                'name' => 'Traditional Wear',
                'slug' => 'traditional-wear',
                'image' => 'https://picsum.photos/seed/traditional-wear/400/300',
                'subcategories' => [
                    ['name' => 'Sarees', 'slug' => 'sarees'],
                    ['name' => 'Kurtas', 'slug' => 'kurtas'],
                    ['name' => 'Lehengas', 'slug' => 'lehengas'],
                    ['name' => 'Sherwanis', 'slug' => 'sherwanis'],
                ],
            ],
            [
                'name' => "Kids' Wear",
                'slug' => 'kids-wear',
                'image' => null,
                'subcategories' => [
                    ['name' => "Boys' Clothing", 'slug' => 'boys-clothing'],
                    ['name' => "Girls' Clothing", 'slug' => 'girls-clothing'],
                    ['name' => 'Infant Wear', 'slug' => 'infant-wear'],
                    ['name' => "Kids' Footwear", 'slug' => 'kids-footwear'],
                ],
            ],
            [
                'name' => 'Winter Wear',
                'slug' => 'winter-wear',
                'image' => 'https://picsum.photos/seed/winter-wear/400/300',
                'subcategories' => [
                    ['name' => 'Sweaters', 'slug' => 'sweaters'],
                    ['name' => 'Coats', 'slug' => 'coats'],
                    ['name' => 'Gloves', 'slug' => 'gloves'],
                    ['name' => 'Thermals', 'slug' => 'thermals'],
                ],
            ],
            [
                'name' => 'Sportswear',
                'slug' => 'sportswear',
                'image' => null,
                'subcategories' => [
                    ['name' => 'Tracksuits', 'slug' => 'tracksuits'],
                    ['name' => 'Sports Shoes', 'slug' => 'sports-shoes'],
                    ['name' => 'Gym Wear', 'slug' => 'gym-wear'],
                ],
            ],
            [
                'name' => 'Lingerie & Sleepwear',
                'slug' => 'lingerie-sleepwear',
                'image' => 'https://picsum.photos/seed/lingerie-sleepwear/400/300',
                'subcategories' => [
                    ['name' => 'Bras', 'slug' => 'bras'],
                    ['name' => 'Panties', 'slug' => 'panties'],
                    ['name' => 'Nightwear', 'slug' => 'nightwear'],
                    ['name' => 'Loungewear', 'slug' => 'loungewear'],
                ],
            ],
        ];

        // Create categories and subcategories
        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
                'image' => $categoryData['image'],
            ]);

            foreach ($categoryData['subcategories'] as $subcategoryData) {
                Subcategory::create([
                    'name' => $subcategoryData['name'],
                    'slug' => $subcategoryData['slug'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
