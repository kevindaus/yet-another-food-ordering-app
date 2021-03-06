<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tracking_number' => $this->faker->uuid,
            'status' => Order::STATUS_NEW,
            'order_time' => $this->faker->dateTime(),
            'notes' => $this->faker->text(),
            'total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'customer_id' => Customer::factory(),
        ];
    }
}
