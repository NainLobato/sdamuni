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
            'name' => 'Administrador Godínez',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
