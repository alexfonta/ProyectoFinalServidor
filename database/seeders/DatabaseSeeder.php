<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario admin mediante AdminSeeder
        $this->call(AdminSeeder::class);

        User::updateOrCreate(
            ['username' => 'member', 'email' => 'member@member.com'],
            [
                'name' => 'Member User',
                'password' => bcrypt('member'),
                'rol' => 'member',
                'birthday' => '1995-05-20'
            ]
        );

        // Crear usuario shop
        User::updateOrCreate(
            ['username' => 'shop', 'email' => 'shop@shop.com'],
            [
                'name' => 'Shop User',
                'password' => bcrypt('shop'),
                'rol' => 'shop',
                'birthday' => '1992-03-10'
            ]
        );
    }
}
