<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.destroy']);

        // Tags
        Permission::create(['name' => 'tags.index']);
        Permission::create(['name' => 'tags.edit']);
        Permission::create(['name' => 'tags.show']);
        Permission::create(['name' => 'tags.create']);
        Permission::create(['name' => 'tags.destroy']);

        // Cliemts
        Permission::create(['name' => 'clients.index']);
        Permission::create(['name' => 'clients.edit']);
        Permission::create(['name' => 'clients.show']);
        Permission::create(['name' => 'clients.create']);
        Permission::create(['name' => 'clients.destroy']);

        // DutyTypes
        Permission::create(['name' => 'dutyTypes.index']);
        Permission::create(['name' => 'dutyTypes.edit']);
        Permission::create(['name' => 'dutyTypes.show']);
        Permission::create(['name' => 'dutyTypes.create']);
        Permission::create(['name' => 'dutyTypes.destroy']);

        // Duties
        Permission::create(['name' => 'duties.index']);
        Permission::create(['name' => 'duties.edit']);
        Permission::create(['name' => 'duties.show']);
        Permission::create(['name' => 'duties.create']);

        $superuser = Role::create(['name' => 'Superusuario']);
        $superuser->givePermissionTo(Permission::all());

        $administrator = Role::create(['name' => 'Administrador']);
        $administrator->givePermissionTo([
            'users.index',
            'users.edit',
            'users.show',
            'users.create',
            'users.destroy',
        ]);

        $supervisor = Role::create(['name' => 'Supervisor']);
        $supervisor->givePermissionTo([
            'users.index',
            'users.edit',
        ]);

        $client = Role::create(['name' => 'Cliente']);
        $responsible = Role::create(['name' => 'Responsable']);

        $user = User::find(1); // César
        $user->assignRole('Superusuario');

        $userTwo = User::find(2); // Mario
        $userTwo->assignRole('Administrador');
    }
}
