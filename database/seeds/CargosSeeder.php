<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_cargos')->insert([
            ['id' => 1, 'cargo' => 'PRESIDENTE(A) MUNICIPAL'],
            ['id' => 2, 'cargo' => 'SINDICO(A)'],
            ['id' => 3, 'cargo' => 'REGIDOR(A) 1°'],
            ['id' => 4, 'cargo' => 'REGIDOR(A) 2°'],
            ['id' => 5, 'cargo' => 'REGIDOR(A) 3°'],
            ['id' => 6, 'cargo' => 'REGIDOR(A) 4°'],
            ['id' => 7, 'cargo' => 'REGIDOR(A) 5°'],
            ['id' => 8, 'cargo' => 'REGIDOR(A) 6°'],
            ['id' => 9, 'cargo' => 'REGIDOR(A) 7°'],
            ['id' => 10, 'cargo' => 'REGIDOR(A) 8°'],
            ['id' => 11, 'cargo' => 'REGIDOR(A) 9°'],
            ['id' => 12, 'cargo' => 'REGIDOR(A) 10°'],
            ['id' => 13, 'cargo' => 'REGIDOR(A) 11°'],
            ['id' => 14, 'cargo' => 'REGIDOR(A) 12°'],
            ['id' => 15, 'cargo' => 'REGIDOR(A) 13°'],
            ['id' => 16, 'cargo' => 'REGIDOR(A) 14°'],
            ['id' => 17, 'cargo' => 'TESORERO(A)'],
            ['id' => 18, 'cargo' => 'SECRETARIO(A) DE AYUNTAMIENTO'],
            ['id' => 19, 'cargo' => 'DIRECTOR(A) DE OBRAS PUBLICAS'],
            ['id' => 20, 'cargo' => 'OTRO']
        ]);








    }
}
