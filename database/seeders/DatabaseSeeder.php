<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolesPermissionsSeeder::class,
            TagSeeder::class,
            ClientSeeder::class,
            DutyTypeSeeder::class,
            IncidentSeeder::class,
            DutySeeder::class,
            DutyIncidentSeeder::class,
            DelegationSeeder::class,
        ]);
    }
}
