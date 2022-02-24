<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'tax'  => $this->faker->randomFloat(2, 0, 100),
            'sale_price' => $this->faker->randomFloat(2, 0, 100),
            'purchase_price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->text(),
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
            'is_active' => $this->faker->boolean(),

        ];
    }
}
