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
            'dalle' => '9:00',
            'alle' => '9:30',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'dalle' => '9:30',
            'alle' => '10:00',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'dalle' =>  '10:00',
            'alle' =>  '10:30',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'dalle' =>  '10:30',
            'alle' =>    '11:00',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'dalle' => '11:00',
            'alle' => '11:30',
        ]);
        \App\Models\Slot::create([
            'giorno' => 'Lunedì',
            'dalle' => '11:30',
            'alle' => '12:00',
        ]);


          //martedì  9-12
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '9:00',
            'alle' => '9:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '9:30',
            'alle' => '10:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '10:00',
            'alle' => '10:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '10:30',
            'alle' => '11:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '11:00',
            'alle' => '11:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Martedì',
            'dalle' => '11:30',
            'alle' => '12:00',
        ])   ;

        //mercoledì  16-18:30
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'dalle' => '16:00',
            'alle' => '16:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'dalle' => '16:30',
            'alle' => '17:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'dalle' => '17:00',
            'alle' => '17:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'dalle' => '17:30',
            'alle' => '18:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Mercoledì',
            'dalle' => '18:00',
            'alle' => '18:30',
        ])   ;


        //giovedì  16-18:30
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'dalle' => '16:00',
            'alle' => '16:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'dalle' => '16:30',
            'alle' => '17:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'dalle' => '17:00',
            'alle' => '17:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'dalle' => '17:30',
            'alle' => '18:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Giovedì',
            'dalle' => '18:00',
            'alle' => '18:30',
        ])   ;


        //venerdì  9-12
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '9:00',
            'alle' => '9:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '9:30',
            'alle' => '10:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '10:00',
            'alle' => '10:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '10:30',
            'alle' => '11:00',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '11:00',
            'alle' => '11:30',
        ])   ;
        \App\Models\Slot::create  ([
            'giorno' => 'Venerdì',
            'dalle' => '11:30',
            'alle' => '12:00',
        ]);
    }
}
