<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data rolw ke table roles
        $admin = Role::create(['name' => 'admin']);
        $writer = Role::create(['name' => 'writer']);
        $user = Role::create(['name' => 'user']);

        $admin->givePermissionTo(['read admin/roles', 'create admin/roles', 'update admin/roles', 'delete admin/roles']);
        $writer->givePermissionTo(['read admin/roles', 'create admin/roles']);
        $user->givePermissionTo(['read admin/roles']);
    }
}
