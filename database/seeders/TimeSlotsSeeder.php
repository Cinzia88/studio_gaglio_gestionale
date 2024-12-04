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
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '9:00',
            'end' => '9:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '9:30',
            'end' => '10:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '10:00',
            'end' => '10:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '10:30',
            'end' => '11:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '11:00',
            'end' => '11:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 1,
            'start' => '11:30',
            'end' => '12:00',
        ]);


        //martedì(9-12)
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '9:00',
            'end' => '9:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '9:30',
            'end' => '10:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '10:00',
            'end' => '10:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '10:30',
            'end' => '11:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '11:00',
            'end' => '11:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 2,
            'start' => '11:30',
            'end' => '12:00',
        ]);

        //mercoledì(16-18:30)
        \App\Models\Slot::create([
            'schedule_id' => 3,
            'start' => '16:00',
            'end' => '16:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 3,
            'start' => '16:30',
            'end' => '17:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 3,
            'start' => '17:00',
            'end' => '17:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 3,
            'start' => '17:30',
            'end' => '18:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 3,
            'start' => '18:00',
            'end' => '18:30',
        ]);


        //giovedì(16-18:30)
        \App\Models\Slot::create([
            'schedule_id' => 4,
            'start' => '16:00',
            'end' => '16:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 4,
            'start' => '16:30',
            'end' => '17:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 4,
            'start' => '17:00',
            'end' => '17:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 4,
            'start' => '17:30',
            'end' => '18:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 4,
            'start' => '18:00',
            'end' => '18:30',
        ]);


        //venerdì(9-12)
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '9:00',
            'end' => '9:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '9:30',
            'end' => '10:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '10:00',
            'end' => '10:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '10:30',
            'end' => '11:00',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '11:00',
            'end' => '11:30',
        ]);
        \App\Models\Slot::create([
            'schedule_id' => 5,
            'start' => '11:30',
            'end' => '12:00',
        ]);



    }
}
