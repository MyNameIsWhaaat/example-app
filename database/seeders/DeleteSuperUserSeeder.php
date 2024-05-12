<?php

 

namespace Database\Seeders;
use App\Models\User;
 
use Illuminate\Database\Seeder;
 

class DeleteSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Найдите и удалите пользователя с помощью email
        User::where('email', 'superadmin@admin.com')->delete();
        
        // Можно также добавить здесь логику для удаления других созданных данных, если это необходимо
    }
}