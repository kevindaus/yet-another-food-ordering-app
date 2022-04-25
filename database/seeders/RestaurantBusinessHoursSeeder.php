<?php

namespace Database\Seeders;

use App\Models\RestaurantBusinessHours;
use Illuminate\Database\Seeder;

class RestaurantBusinessHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestaurantBusinessHours::factory()->count(5)->create();
    }
}
