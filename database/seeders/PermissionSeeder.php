<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'show leads']);
        Permission::create(['name'=>'add leads']);
        Permission::create(['name'=>'edit leads']);
        Permission::create(['name'=>'delete leads']);
    }
}
