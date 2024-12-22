<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'items' => json_encode([
                ['id' => 1, 'name' => $this->faker->word()],
            ]),
        ];
    }
}
