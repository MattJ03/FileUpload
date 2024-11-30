<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modRole = Role::create(['name' => 'mod']);
        $userRole = Role::create(['name' => 'user']);

        Permission::create(['name' => 'upload file']);
        Permission::create(['name' => 'download file']);
        Permission::create([['name' => 'delete file']]);
        Permission::create(['name' => 'show file']);

        $modRole->givePermissionTo('upload file', 'download file', 'show file');
        $userRole->givePermissionTo('download file', 'show file');


    }
}
