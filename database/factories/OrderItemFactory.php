<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'order_id' => Orders::all()->random()->id,
            'quantity' => $this->faker->numberBetween($min = 1, $maX = 100),
            'total' => $this->faker->numberBetween($min = 1, $maX = 10000),
            'remember_token' => Str::random(10),
        ];
    }
}
