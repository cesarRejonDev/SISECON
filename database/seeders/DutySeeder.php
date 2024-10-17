<?php

namespace Database\Seeders;

use App\Models\Duty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DutySeeder extends Seeder
{
    public function run(): void
    {
        Duty::create([
            'subject' => 'Consigna de prueba',
            'folio_number' => 'CARCDO24-1',
            'duty_date' => '2024/06/07',
            'duty_type_id' => 1,
            'client_id' => 8,
            'created_by' => 1,
            'file_url' => 'sinarchivo.docx',
            'ulid' => Str::ulid(),
        ]);
    }
}
