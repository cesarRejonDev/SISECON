<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $avatarsPath = public_path('assets/img/clients');
        $avatars = File::files($avatarsPath);

        $avatarFiles = [];
        foreach ($avatars as $avatar) {
            $originalName = $avatar->getFilename();
            $filePath = Storage::disk('public')->putFileAs('avatars/clients', $avatar, $originalName);
            $avatarFiles[$originalName] = $filePath;
        }

        $clients = [
            [
                'name' => 'Shangri-La',
                'acronym' => 'SLA',
                'description' => 'Hotel & Resort',
                'ulid' => Str::ulid(),
                'tag_id' => 1,
            ],
            [
                'name' => 'Edificio Corporativo ECO',
                'acronym' => 'ECO',
                'description' => 'Edificio Central de INTEC&FOR',
                'ulid' => Str::ulid(),
                'tag_id' => 3,
            ],
            [
                'name' => 'SLS HARBOUR',
                'acronym' => 'SLH',
                'description' => 'Hotel, Beach,Residence and Resort',
                'ulid' => Str::ulid(),
                'tag_id' => 1,
            ],
            [
                'name' => 'SLS NOVO CANCUN',
                'acronym' => 'SLN',
                'description' => 'Hotel, Beach, Residence and Resort',
                'ulid' => Str::ulid(),
                'tag_id' => 1,
            ],
            [
                'name' => 'SECRETS MOXCHE',
                'acronym' => 'SMX',
                'description' => 'Hotel, resort AAA Five Diamond',
                'ulid' => Str::ulid(),
                'tag_id' => 1,
            ],
            [
                'name' => 'QUINTAS MADEIRA',
                'acronym' => 'QUM',
                'description' => 'Condominio residencial, privado y exclusivo',
                'ulid' => Str::ulid(),
                'tag_id' => 2,
            ],
            [
                'name' => 'FRACCIONAMIENTO VILLAS DEL LAGO',
                'acronym' => 'FVL',
                'description' => 'Fraccionamiento privado con seguridad 24/7',
                'ulid' => Str::ulid(),
                'tag_id' => 4,
            ],
            [
                'name' => 'CARGILL Y AGRIBRANDS',
                'acronym' => 'CAR',
                'description' => 'Proporcionamos alimentos, productos agrícolas, financieros e industriales a las personas que los necesitan en todo el mundo',
                'ulid' => Str::ulid(),
                'tag_id' => 5,
            ],
            [
                'name' => 'PLAZA NICHUPTE',
                'acronym' => 'NIC',
                'description' => 'Proporcionamos alimentos, productos agrícolas, financieros e industriales a las personas que los necesitan en todo el mundo',
                'ulid' => Str::ulid(),
                'tag_id' => 6,
            ],
            [
                'name' => 'GRUPO BLUE DIAMOND RESORTS',
                'acronym' => 'BLU',
                'description' => 'Hotel, Beach, Boutique and Resort',
                'ulid' => Str::ulid(),
                'tag_id' => 1,
            ],
            [
                'name' => 'PLANNER 1 EVENTS',
                'acronym' => 'POE',
                'description' => 'Decor Design, Flowers and forniture rentals',
                'ulid' => Str::ulid(),
                'tag_id' => 7,
            ],
        ];

        foreach ($clients as &$client) {
            foreach ($avatarFiles as $imageName => $filePath) {
                if (stripos($imageName, str_replace(' ', '-', strtolower($client['name']))) !== false) {
                    $client['avatar'] = Storage::url($filePath);
                    break;
                }
            }

            Client::create($client);
        }
    }
}
