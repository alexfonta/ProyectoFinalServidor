<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin', 'email' => 'alex@admin.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('alexadmin'),
                'rol' => 'admin',
                'birthday' => '1990-01-15'
            ]
        );
    }
}
