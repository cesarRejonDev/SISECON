<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Hotel',
            'Condominio',
            'Edificio corporativo',
            'Fraccionamiento',
            'Almacén',
            'Plaza comercial',
            'Eventos',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
