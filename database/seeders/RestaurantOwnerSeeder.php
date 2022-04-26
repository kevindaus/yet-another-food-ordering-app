<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RestaurantOwnerSeeder extends Seeder
{
    public function run()
    {
        $createdOnwer1= User::factory()
            ->create([
                'name' => 'owner1',
                'email' => 'owner1@owner.com',
                'password' => \Hash::make('password'),
            ]);
        $createdOnwer1->syncRoles(User::getRestaurantOwnerRole());
    }
}
