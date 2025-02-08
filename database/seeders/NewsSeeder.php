<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'news_id' => 1,
                'imagen_url' => 'covers/actualizacion.jpg',
                'title' => 'Nueva actualización del juego',
                'description' => 'Hemos lanzado una emocionante actualización que incluye nuevas características y mejoras.',
                'publication_date' => '2023-09-15',
                'rating_id' => 1,
            ],
            [
                'news_id' => 2,
                'imagen_url' => 'covers/evento.png',
                'title' => 'Evento de fin de semana',
                'description' => '¡No te pierdas nuestro evento especial este fin de semana con recompensas exclusivas!',
                'publication_date' => '2023-09-10',
                'rating_id' => 2,
            ],
            [
                'news_id' => 3,
                'imagen_url' => 'covers/desarrollo.jpg',
                'title' => 'Conoce al equipo de desarrollo',
                'description' => 'Descubre quiénes están detrás de la creación de nuestro juego y sus historias.',
                'publication_date' => '2023-09-05',
                'rating_id' => 3,
            ],
            [
                'news_id' => 4,
                'imagen_url' => 'covers/seguridad.jpg',
                'title' => 'Actualización de seguridad importante',
                'description' => 'Hemos implementado una actualización de seguridad crucial para proteger tu cuenta.',
                'publication_date' => '2023-09-01',
                'rating_id' => 1,
            ],
            [
                'news_id' => 5,
                'imagen_url' => 'covers/contenido.jpg',
                'title' => 'Nuevos contenidos para los jugadores',
                'description' => 'Anunciamos nuevos contenidos emocionantes que llegarán pronto al juego.',
                'publication_date' => '2023-08-25',
                'rating_id' => 4,
            ],
        ]);
    }
}
