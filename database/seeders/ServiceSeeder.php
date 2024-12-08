<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'nome' => 'Agenzia Assicurazioni',
            'descrizione' => 'agenzia',
        ]);

        Service::create([
            'nome' => 'Corsi di formazione',
            'descrizione' => 'corsi',
        ]);

        Service::create([
            'nome' => 'Patronato',
            'descrizione' => 'caf',
        ]);
    }
}
