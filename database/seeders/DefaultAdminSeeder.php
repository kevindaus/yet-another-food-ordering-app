<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make("password"),
        ]);
    }
}
