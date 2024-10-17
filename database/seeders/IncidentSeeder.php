<?php

namespace Database\Seeders;

use App\Models\Incident;
use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
    public function run(): void
    {
        Incident::create([
            'name' => 'Hubo un incendio 👨🏻‍🚒',
            'description' => 'Por causas naturales se incendió el lobby',
            'file_url' => 'sinarchivo.docx',
        ]);

        Incident::create([
            'name' => 'Robaron las plantas 🍀',
            'description' => 'Entró un ratero y se llevó las plantas',
            'file_url' => 'sinarchivo2.docx',
        ]);
    }
}
