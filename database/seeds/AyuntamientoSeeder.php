<?php

use Illuminate\Database\Seeder;

class AyuntamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ayuntamientos')->insert([
            ['id' => 1, 'municipio_id' => 86, 'escudo' => 'prueba.png','telefono1' => '2283456789','telefono2' => '2283456789','correo' => 'prueba@gmail.com'],

        ]);
    }
}
