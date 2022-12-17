<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'read admin/roles']);
        Permission::create(['name' => 'create admin/roles']);
        Permission::create(['name' => 'update admin/roles']);
        Permission::create(['name' => 'delete admin/roles']);

        Permission::create(['name' => 'read admin/users']);
        Permission::create(['name' => 'assign admin/users']);
        Permission::create(['name' => 'delete admin/users']);

        Permission::create(['name' => 'read admin/permissions']);
        Permission::create(['name' => 'create admin/permissions']);
        Permission::create(['name' => 'update admin/permissions']);
        Permission::create(['name' => 'delete admin/permissions']);
    }
}
