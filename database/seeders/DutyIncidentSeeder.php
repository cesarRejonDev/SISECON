<?php

namespace Database\Seeders;

use App\Models\Duty;
use Illuminate\Database\Seeder;

class DutyIncidentSeeder extends Seeder
{
    public function run(): void
    {
        $duty = Duty::first();

        $duty->incidents()->sync([1, 2]);
    }
}
