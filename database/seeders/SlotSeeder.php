<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        //lunedì  9-12
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' => '9:00',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' => '9:30',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' =>  '10:00',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' =>  '10:30',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' => '11:00',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' => '11:30',
        ]);

        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'ora' => '12:00',
        ]);

          //martedì  9-12
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '9:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '9:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '10:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '10:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '11:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'ora' => '11:30',
        ])   ;

        \App\Models\Slot::create([
            'giorno' => 'Martedì',
            'ora' => '12:00',
        ]);
        //mercoledì  16-18:30
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '16:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '16:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '17:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '17:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '18:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'ora' => '18:30',
        ])   ;

        //giovedì  16-18:30
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '16:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '16:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '17:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '17:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '18:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'ora' => '18:30',
        ])   ;

        //venerdì  9-12
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '9:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '9:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '10:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '10:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '11:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '11:30',
        ]);
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'ora' => '12:00',
        ]);
    }
}
