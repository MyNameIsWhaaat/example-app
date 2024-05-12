<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superUser = User::create([
                "name"=> "SuperAdmin",
                "email"=> "superadmin@admin.com",
                "password"=> bcrypt("admin123"), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);

        Role::create([
            'name' => 'super-user', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $superUser->assignRole('super-user');
    }
}
