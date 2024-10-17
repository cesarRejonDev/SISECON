<?php

namespace Database\Seeders;

use App\Models\DutyType;
use Illuminate\Database\Seeder;

class DutyTypeSeeder extends Seeder
{
    public function run(): void
    {
        $dutyTypes = [
            [
                'name' => 'Chofer de operaciones',
                'acronym' => 'CDO',
                'word_template_url' => 'templates/CHOFER.doc',
            ],
            [
                'name' => 'Coordinador de turno diurno',
                'acronym' => 'CTD',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Coordinador de turno nocturno',
                'acronym' => 'CTN',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Generales de seguridad en obra',
                'acronym' => 'GSO',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Generales de seguridad',
                'acronym' => 'GS',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Generales para oficiales manejadores caninos',
                'acronym' => 'GOMC',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Supervisor de operaciones diurno',
                'acronym' => 'SOD',
                'word_template_url' => 'templates/'
            ],
            [
                'name' => 'Supervisor de operaciones nocturno',
                'acronym' => 'SON',
                'word_template_url' => 'templates/'
            ],
        ];

        foreach ($dutyTypes as $dutyType) {
            DutyType::create($dutyType);
        }
    }
}
