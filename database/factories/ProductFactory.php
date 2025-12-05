<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->linuxProcessor();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => $this->faker->numberBetween(1000, 999999),
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text(),
            'category_id' => Category::all()->random()->id,
            'image' => $this->faker->imageUrl(),
            'is_active' => true,
            'vendor_id' => 1,
        ];
    }
}
