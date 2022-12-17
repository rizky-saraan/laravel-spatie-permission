<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Role',
            'url' => 'admin/roles',
            'icon' => 'key-outline',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Permission',
            'url' => 'admin/permissions',
            'icon' => 'lock-closed-outline',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'User',
            'url' => 'admin/users',
            'icon' => 'person-outline',
            'main_menu' => null,
        ]);
    }
}
