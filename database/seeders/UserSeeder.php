<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $avatarsPath = public_path('assets/img/avatars');
        $avatars = File::files($avatarsPath);

        foreach ($avatars as $avatar) {
            $originalName = $avatar->getFilename();
            $filePath = Storage::disk('public')->putFileAs('avatars/users', $avatar, $originalName);
        }

        User::create([
            'name' => 'César',
            'paternal_last_name' => 'Rejón',
            'full_name' => 'César Rejón',
            'avatar' => Storage::url('avatars/users/'.$avatars[0]->getFilename()),
            'ulid' => Str::ulid(),
            'email' => 'cesar@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Mario',
            'paternal_last_name' => 'Álvarez',
            'maternal_last_name' => 'Ponce',
            'full_name' => 'Mario Álvarez Ponce',
            'avatar' => Storage::url('avatars/users/'.$avatars[1]->getFilename()),
            'ulid' => Str::ulid(),
            'email' => 'mario@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
