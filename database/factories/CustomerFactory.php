<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'mobile_number' => $this->faker->regexify('[0-9]{11}'),
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'town' => $this->faker->regexify('[A-Za-z0-9]{8}'),
            'province' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'address_location_longitude' => $this->faker->randomFloat(0, 0, 9999999999.),
            'address_location_latitude' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
