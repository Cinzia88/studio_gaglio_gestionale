<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //lunedì(9-12)
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '9:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '9:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '10:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '10:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '11:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '11:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Lunedì',
            'ora' => '12:00',
        ]);

        //martedì(9-12)
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '9:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '9:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '10:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '10:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '11:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '11:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Martedì',
            'ora' => '12:00',
        ]);

        //venerdì(9-12)
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '9:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '9:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '10:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '10:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '11:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '11:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Venerdì',
            'ora' => '12:00',
        ]);



        //mercoledì(16-18:30)
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '16:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '16:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '17:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '17:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '18:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Mercoledì',
            'ora' => '18:30',
        ]);


        //giovedì(16-18:30)
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '16:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '16:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '17:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '17:30',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '18:00',
        ]);
        \App\Models\Timeslot::factory()->create([
            'data' => 'Giovedì',
            'ora' => '18:30',
        ]);
    }
}
