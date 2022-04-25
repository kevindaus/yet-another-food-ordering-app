<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'date_opened' => $this->faker->dateTime(),
            'service_options' => '{}',
            'location_longitude' => $this->faker->randomFloat(0, 0, 9999999999.),
            'location_latitude' => $this->faker->randomFloat(0, 0, 9999999999.),
            'address_1' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'address_2' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'town' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'city' => $this->faker->city,
            'user_id' => User::factory(),
        ];
    }
}
