<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'nombre' => 'ADMINISTRADOR',
            'primer_ap' => 'APELLIDO',
            'segundo_ap' => 'APELLIDO',
            'correo' => 'admin@gmail.com',
            'nivel' => 1,
            'password' => bcrypt('admin'),
        ]);
    }
}
