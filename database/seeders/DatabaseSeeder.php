<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'KIOSK CLE',
            'email' => 'kiosk@admin.com',
            'password' => Hash::make('kioskcle2023'),
            'role' => 'admin',
            'active' => true,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'abraham',
            'email' => 'imsolis@hotmail.com',
            'password' => Hash::make('solis232r'),
            'role' => 'asesor',
            'active' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Moises',
            'email' => 'moyses_mvp@hotmail.com',
            'password' => Hash::make('moiseshdez'),
            'role' => 'asesor',
            'active' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Moises Hdez',
            'email' => 'moysesmvp@gmail.com',
            'password' => Hash::make('moiseshdez'),
            'role' => 'director',
            'active' => true,
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'MoisesGamerPro',
            'email' => 'contactoMoisesGamerPro@gmail.com',
            'password' => Hash::make('moiseshdez'),
            'role' => 'consulta',
            'active' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Moises Cuevas',
            'email' => 'moiseshdezc96@gmail.com',
            'password' => Hash::make('moiseshdez'),
            'role' => 'docente',
            'active' => true,
        ]);
        
    }
}
