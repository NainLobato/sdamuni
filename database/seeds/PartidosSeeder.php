<?php

use Illuminate\Database\Seeder;

class PartidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_partidos')->insert([
            ['id' => 1, 'partido' => 'Partido Acción Nacional'],
            ['id' => 2, 'partido' => 'Partido Revolucionario Institucional'],
            ['id' => 3, 'partido' => 'Partido de la Revolución Democrática'],
            ['id' => 4, 'partido' => 'Partido del Trabajo'],
            ['id' => 5, 'partido' => 'Partido Verde Ecologista de México'],
            ['id' => 6, 'partido' => 'Movimiento Ciudadano'],
            ['id' => 7, 'partido' => 'Morena']
        ]);
    }
}
