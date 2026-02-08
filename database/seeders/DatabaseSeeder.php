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
        // Crear usuario admin
        User::updateOrCreate(
            ['username' => 'admin', 'email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123'),
                'rol' => 'admin',
                'birthday' => '1990-01-15'
            ]
        );

        // Crear usuario member normal
        User::updateOrCreate(
            ['username' => 'member', 'email' => 'member@example.com'],
            [
                'name' => 'Member User',
                'password' => bcrypt('password123'),
                'rol' => 'member',
                'birthday' => '1995-05-20'
            ]
        );

        // Crear usuario shop
        User::updateOrCreate(
            ['username' => 'shop', 'email' => 'shop@example.com'],
            [
                'name' => 'Shop User',
                'password' => bcrypt('password123'),
                'rol' => 'shop',
                'birthday' => '1992-03-10'
            ]
        );

        // Crear eventos de prueba
        Event::updateOrCreate(
            ['name' => 'Partido Oficial vs Team Alpha'],
            [
                'description' => 'Partido clasificatorio de la temporada. Esperamos una gran participación del público.',
                'location' => 'Estadio Central, Valencia',
                'date' => now()->addDays(7),
                'hour' => '19:00:00',
                'type' => 'official',
                'tags' => 'oficial, temporal, importante',
                'visible' => true
            ]
        );

        Event::updateOrCreate(
            ['name' => 'Exhibición Amistosa'],
            [
                'description' => 'Partido de exhibición contra el equipo veterano. Será una excelente oportunidad para ver a los nuevos talentos.',
                'location' => 'Estadio Secundario, Valencia',
                'date' => now()->addDays(14),
                'hour' => '18:30:00',
                'type' => 'exhibition',
                'tags' => 'amistoso, exhibition',
                'visible' => true
            ]
        );

        Event::updateOrCreate(
            ['name' => 'Torneo Benéfico por la Salud'],
            [
                'description' => 'Evento benéfico donde los fondos recaudados se donarán a asociaciones de salud local.',
                'location' => 'Polideportivo Comarcal',
                'date' => now()->addDays(21),
                'hour' => '17:00:00',
                'type' => 'charity',
                'tags' => 'benéfico, caridad, comunidad',
                'visible' => true
            ]
        );
    }
}
