<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Food;
use App\Models\FoodReview;

class FoodReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraphs(3, true),
            'rating' => $this->faker->numberBetween(-10000, 10000),
            'food_id' => Food::factory(),
            'customer_id' => Customer::factory(),
        ];
    }
}
