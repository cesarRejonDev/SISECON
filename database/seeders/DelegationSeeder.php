<?php

namespace Database\Seeders;

use App\Models\Delegation;
use Illuminate\Database\Seeder;

class DelegationSeeder extends Seeder
{
    public function run(): void
    {
        $delegations = [
            [
                'name' => 'Othón P. Blanco',
                'acronym' => 'OPB',
            ],
            [
                'name' => 'Benito Juárez',
                'acronym' => 'BJU',
            ],
            [
                'name' => 'Solidaridad',
                'acronym' => 'SOL',
            ],
            [
                'name' => 'Cozumel',
                'acronym' => 'CZM',
            ],
            [
                'name' => 'Bacalar',
                'acronym' => 'BCR',
            ],
            [
                'name' => 'Tulúm',
                'acronym' => 'TUL',
            ],
            [
                'name' => 'Tizimin (Yucatán)',
                'acronym' => 'TZM',
            ],
        ];

        foreach ($delegations as $delegation) {
            Delegation::create($delegation);
        }
    }
}
