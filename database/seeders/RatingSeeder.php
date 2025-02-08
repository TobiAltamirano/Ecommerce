<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('ratings')->insert([
            [
                'rating_id' => 1,
                'name' => 'Actualización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating_id' => 2,
                'name' => 'Eventos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating_id' => 3,
                'name' => 'Equipo de desarrollo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating_id' => 4,
                'name' => 'Personajes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
        ]);
    }
}
