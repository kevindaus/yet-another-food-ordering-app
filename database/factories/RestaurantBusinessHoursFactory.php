<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use App\Models\RestaurantBusinessHours;

class RestaurantBusinessHoursFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestaurantBusinessHours::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'week_name' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'open' => $this->faker->time(),
            'close' => $this->faker->time(),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}
