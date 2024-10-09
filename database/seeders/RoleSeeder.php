<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'write post']);

        $role->givePermissionTo($permission);

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit post']);

        $role->givePermissionTo($permission);

        $user = User::find(1);

        $user->assignRole('admin');

        $user = User::find(2);

        $user->assignRole('writer');
    }
}
