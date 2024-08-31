<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x < 10; $x++) {
            $user = [
                'name' => fake()->name,
                'email' => fake()->email,
                'password' => bcrypt(fake()->password),
                'business_name' => fake()->name()
            ];

            User::updateOrCreate(['email' => $user['email']], [...$user]);
        }
    }
}
