<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total_amount_payable' => $this->faker->randomFloat(0, 0, 9999999999.),
            'amount_paid' => $this->faker->randomFloat(0, 0, 9999999999.),
            'change' => $this->faker->randomFloat(0, 0, 9999999999.),
            'customer_id' => Customer::factory(),
            'order_id' => Order::factory(),
        ];
    }
}
