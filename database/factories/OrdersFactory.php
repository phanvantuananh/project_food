<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'order_status' => $this->faker-> numberBetween($min = 0, $maX = 1),
            'order_user' => $this->faker->name(),
            'order_email' => $this->faker->safeEmail(),
            'order_phone' => $this->faker->phoneNumber(),
            'order_address' => $this->faker->address(),
            'order_total' => $this->faker->numberBetween($min = 1, $maX = 1000),
            'remember_token' => Str::random(10),
        ];
    }
}
