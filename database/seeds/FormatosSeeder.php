<?php

use Illuminate\Database\Seeder;

class FormatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_formatos')->insert([
            ['id' => 1, 'nombre' => 'RELACIÓN DE ENTIDADES PARAMUNICIPALES'],
            ['id' => 2, 'nombre' => 'RELACIÓN DE MANUALES ADMINISTRATIVOS'],
            ['id' => 3, 'nombre' => 'RELACIÓN DE LIBROS DE ACTAS DE CABILDO'],
            ['id' => 4, 'nombre' => 'RELACIÓN DE ACUERDOS DE CABILDO PENDIENTES DE CUMPLIR'],
            ['id' => 5, 'nombre' => 'RELACIÓN DE ACTAS DEL CONSEJO DE PLANEACIÓN PARA EL DESARROLLO MUNICIPAL'],
            ['id' => 6, 'nombre' => 'RELACIÓN DE ACTAS DEL CONSEJO DE DESARROLLO MUNICIPAL'],
            ['id' => 7, 'nombre' => 'RELACIÓN DE JUCIOS EN PROCESO PROMOVIDO POR EL AYUNTAMIENTO'],
            ['id' => 8, 'nombre' => 'RELACIÓN DE JUICIOS EN PROCESO PROMOVIDOS EN CONTRA DEL AYUNTAMIENTO'],
            ['id' => 9, 'nombre' => 'RELACIÓN DE  CONTRATOS, CONVENIOS O ACUERDOS'],
            ['id' => 10, 'nombre' => 'ARQUEO DE CAJA'],
            ['id' => 11, 'nombre' => 'CONCILIACION BANCARIA'],
            ['id' => 12, 'nombre' => 'SITUACIÓN DE TALONARIOS DE CHEQUES'],
            ['id' => 13, 'nombre' => 'INVENTARIO DE FORMAS VALORADAS'],
         
        ]);
    }
}
