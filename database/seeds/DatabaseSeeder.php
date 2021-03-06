<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FormatosSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DistritosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(PartidosSeeder::class);
        $this->call(AyuntamientoSeeder::class); // Seeder  para registro de prueba
        $this->call(ValoresEfectivoSeeder::class);
        $this->call(CatTecnicoSeeder::class);



    }
}
