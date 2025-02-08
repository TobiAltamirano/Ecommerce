<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'title' => 'The Last Of Us',
                'description' => '"The Last of Us" es un videojuego de acción y aventuras desarrollado por Naughty Dog y publicado por Sony Computer Entertainment. Este juego, lanzado en 2013 para la consola PlayStation 3 y posteriormente remasterizado para la PlayStation 4, se ha ganado un lugar destacado en la industria de los videojuegos gracias a su narrativa emocionante, personajes memorables y una experiencia de juego intensa.

                La trama de "The Last of Us" se desarrolla en un mundo postapocalíptico devastado por una pandemia que ha convertido a la mayoría de la población en criaturas mutantes hostiles. El jugador asume el papel de Joel, un hombre endurecido por la tragedia, y Ellie, una joven valiente e inteligente que podría tener la clave para salvar a la humanidad. Juntos, emprenden un peligroso viaje a través de un Estados Unidos en ruinas en busca de un grupo de rebeldes conocidos como los Luciérnagas.
                
                Lo que distingue a "The Last of Us" es su enfoque en la narrativa y la construcción de personajes. La relación entre Joel y Ellie es el corazón de la historia, y los jugadores experimentan un crecimiento y desarrollo notables en estos personajes a medida que enfrentan los desafíos desgarradores de un mundo posapocalíptico. Además, el juego presenta una jugabilidad emocionante que combina sigilo, acción y resolución de acertijos, lo que lo convierte en una experiencia inmersiva y desafiante.
                
                Los gráficos impresionantes, la música conmovedora y la atmósfera sombría contribuyen a crear un mundo creíble y envolvente que atrapa a los jugadores desde el principio hasta el final. La narración magistral y los momentos emotivos hacen que "The Last of Us" sea una obra maestra en el mundo de los videojuegos, celebrada por su capacidad para contar una historia conmovedora en un contexto apocalíptico.
                
                El juego ha recibido numerosos premios y elogios de la crítica y ha ganado una base de fans apasionada. "The Last of Us" no solo es un logro técnico en la industria de los videojuegos, sino también una obra maestra que ha tocado los corazones de los jugadores y ha dejado una impresión duradera en la cultura del juego.',
                'imagen_url' => 'https://hips.hearstapps.com/hmg-prod/images/the-last-of-us-1583485116.jpg?crop=0.627xw:1.00xh;0.236xw,0&resize=640:*',
                'release_date' => '2013-06-14',
                'creator' => 'Neil Druckmann',
                'company' => 'Naughty Dog',
                'price' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'The Last Of Us Parte II',
                'description' => '"The Last of Us Part II es un videojuego de terror y de acción y aventuras de 2020 desarrollado por Naughty Dog y publicado por Sony Interactive Entertainment para PlayStation 4.1​ Ambientado cinco años después de The Last of Us (2013), el juego se centra en dos personajes jugables en un Estados Unidos post-apocalíptico cuyas vidas se entrelazan: Ellie, que busca venganza después de sufrir una tragedia, y Abby, una soldado que se ve envuelta en un conflicto entre su milicia y un culto religioso. El juego se juega desde la perspectiva de la tercera persona y le permite al jugador luchar contra enemigos humanos e infectados con armas de fuego, armas improvisadas y sigilo.
                
                El desarrollo de The Last of Us Part II comenzó en 2014, poco después del lanzamiento de The Last of Us Remastered. Neil Druckmann regresó como director creativo, coescribiendo la historia con Halley Gross. Los temas de venganza y retribución del juego se inspiraron en las experiencias de Druckmann al crecer en Israel. Ashley Johnson repite su papel de Ellie, mientras que Laura Bailey fue elegida como Abby. Sus actuaciones incluyeron la grabación simultánea de movimiento y voz. Los desarrolladores impulsaron las capacidades técnicas de PlayStation 4 durante el desarrollo. Gustavo Santaolalla volvió a componer e interpretar la partitura. Según se informó, el desarrollo incluyó un cronograma de trabajo de 12 horas.',
                'imagen_url' => 'https://sm.ign.com/ign_latam/news/t/the-last-o/the-last-of-us-part-2-is-getting-a-ps5-exclusive-performance_abvm.jpg',
                'release_date' => '2020-05-19',
                'creator' => 'Neil Druckmann',
                'company' => 'Naughty Dog',
                'price' => 24000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'The Last Of Us - Left Behind',
                'description' => 'The Last of Us: Left Behind es un videojuego de acción-aventura tipo videojuego de terror desarrollado por Naughty Dog y publicado por Sony Computer Entertainment. Fue lanzado en todo el mundo para PlayStation 3 el 14 de febrero de 2014, como un paquete de expansión descargable (DLC) para The Last of Us; más tarde se incluyó con The Last of Us Remastered, una versión actualizada del juego lanzado para PlayStation 4 el 29 de julio de 2014,1​ y se lanzó como un paquete de expansión independiente para ambas consolas el 12 de mayo de 2015. Ambientados en un mundo post-apocalíptico, los jugadores controlan a Ellie, una adolescente que pasa tiempo con su mejor amiga Riley después de su inesperado regreso.

                The Last of Us: Left Behind se juega desde una perspectiva en tercera persona; los jugadores usan armas de fuego, armas improvisadas y sigilo para defenderse de humanos hostiles y criaturas zombis infectadas por una cepa mutada del hongo Cordyceps. Los jugadores pueden usar el "Modo de escucha" para localizar enemigos a través de una mayor sensación de audición y conciencia espacial. El juego también cuenta con un sistema de fabricación, que permite a los jugadores personalizar las armas a través de las actualizaciones.',
                'imagen_url' => 'https://assetsio.reedpopcdn.com/139230786269.jpg?width=1200&height=1200&fit=crop&quality=100&format=png&enable=upscale&auto=webp',
                'release_date' => '2013-06-14',
                'creator' => 'Neil Druckmann',
                'company' => 'Naughty Dog',
                'price' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
