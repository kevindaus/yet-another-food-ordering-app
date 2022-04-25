<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Rider;

class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delivery_status' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'order_id' => Order::factory(),
            'rider_id' => Rider::factory(),
        ];
    }
}
