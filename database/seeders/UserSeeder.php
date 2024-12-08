<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // create demo users
      \App\Models\User::factory()->create([
        'name' => 'Studio Gaglio',
        'email' => 'studio_gaglio@gmail.com',
        'password' => 'password',
    ]);


    }
}
