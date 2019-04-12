<?php

use Illuminate\Database\Seeder;

class DistritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_distritos')->insert([
            ['id' => 1, 'distrito' => 1],
            ['id' => 2, 'distrito' => 2],
            ['id' => 3, 'distrito' => 3],
            ['id' => 4, 'distrito' => 4],
            ['id' => 5, 'distrito' => 5],
            ['id' => 6, 'distrito' => 6],
            ['id' => 7, 'distrito' => 7]
        ]);
    }
}
