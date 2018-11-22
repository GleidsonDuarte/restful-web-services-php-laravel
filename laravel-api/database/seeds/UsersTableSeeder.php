<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'name'		=> 'Carlos Ferreira',
        	'email'		=> 'carlos@especializa.com.br',
        	'password'	=> bcrypt('123456'),
        ]);
    }
}
