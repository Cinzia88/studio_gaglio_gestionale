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
        'name' => 'Admin',
        'email' => 'patronatogaglio@gmail.com',
        'password' => 'password',
    ]);


    }
}
