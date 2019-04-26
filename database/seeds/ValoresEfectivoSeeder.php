<?php

use Illuminate\Database\Seeder;

class ValoresEfectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_valor_efectivo')->insert([
            ['id'  =>  1, 'valor' => 0.10 ],
            ['id'  =>  2, 'valor' => 0.20 ],
            ['id'  =>  3, 'valor' => 0.50],
            ['id'  =>  4, 'valor' => 1],
            ['id'  =>  5, 'valor' => 2],
            ['id'  =>  6, 'valor' => 5],
            ['id'  =>  7, 'valor' => 10],
            ['id'  =>  8, 'valor' => 20],
            ['id'  =>  9, 'valor' => 50],
            ['id'  =>  10, 'valor' => 100],
            ['id'  =>  11, 'valor' => 200],
            ['id'  =>  12, 'valor' => 500],
            ['id'  =>  13, 'valor' => 1000],
            ]);
    }
}
