<?php

namespace Database\Factories;

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
        $title = $this->faker->title;

        return [
            'title'       => $title,
            'slug'        => Str::slug($title),
            'description' => $this->faker->text(20),
            'image'       => $this->faker->imageUrl(),

        ];
    }
}
