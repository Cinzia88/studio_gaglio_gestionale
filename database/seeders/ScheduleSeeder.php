<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Schedule::create([
            'day_of_week' => 'Lunedì',
        ]);
        \App\Models\Schedule::create([
            'day_of_week' => 'Martedì',
        ]);
        \App\Models\Schedule::create([
            'day_of_week' => 'Mercoledì',
        ]);
        \App\Models\Schedule::create([
            'day_of_week' => 'Giovedì',
        ]);
        \App\Models\Schedule::create([
            'day_of_week' => 'Venerdì',
        ]);
    }
}
