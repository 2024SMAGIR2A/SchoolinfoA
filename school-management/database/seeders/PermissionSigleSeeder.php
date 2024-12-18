<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSigleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tableHandle = [
            '',
        ];
        $permissionList = ['create', 'edit', 'show', 'delete', 'list', 'trash', 'print'];
        foreach ($tableHandle as $item) {
            foreach ($permissionList as $permission) {
                Permission::create(['name' => $item . '-' . $permission]);
            }
        }
    }
}
