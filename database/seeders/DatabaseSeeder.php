<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\Trip;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Suhail',
            'email' => 'Suhail.1994sss@gmail.com',
            'password' => 'ThatSnazzyGuy'
        ]);


    }
}
