<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::findOrCreate(User::ADMIN_ROLE);
        $restaurantOwner = Role::findOrCreate(User::RESTAURANT_OWNER); // restaurant owners
        $customer = Role::findOrCreate(User::CUSTOMER);
    }
}
