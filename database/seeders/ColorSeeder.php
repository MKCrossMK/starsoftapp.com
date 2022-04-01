<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'descripcion' => 'NINGUNO',
        ]);

        Color::create([
            'descripcion' => 'AMARILLO',
        ]);

        Color::create([
            'descripcion' => 'AZUL',
        ]);

        Color::create([
            'descripcion' => 'ROJO',
        ]);

        Color::create([
            'descripcion' => 'NEGRO',
        ]);

        Color::create([
            'descripcion' => 'MARRON',
        ]);

        Color::create([
            'descripcion' => 'VERDE',
        ]);

        Color::create([
            'descripcion' => 'ROSADO',
        ]);

        Color::create([
            'descripcion' => 'NARANJA',
        ]);

        Color::create([
            'descripcion' => 'BLANCO',
        ]);

        Color::create([
            'descripcion' => 'GRIS',
        ]);

        Color::create([
            'descripcion' => 'VIOLETA',
        ]);

        Color::create([
            'descripcion' => 'PURPURA',
        ]);

        Color::create([
            'descripcion' => 'TURQUESA',
        ]);

    }
}
