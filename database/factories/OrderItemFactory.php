<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;

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
            'quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
            'unit_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'order_id' => Order::factory(),
            'food_id' => Food::factory(),
        ];
    }
}
