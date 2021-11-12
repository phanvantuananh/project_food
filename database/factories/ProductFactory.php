<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'product_name' => $this->faker->name(),
            'product_image' => $this->faker->imageUrl(),
            'product_price' => $this->faker->numberBetween($min = 1, $maX = 10000),
            'product_content' => $this->faker->text(),
            'product_quantity' => $this->faker->numberBetween($min = 1, $maX = 100),
            'remember_token' => Str::random(10),
        ];
    }
}
