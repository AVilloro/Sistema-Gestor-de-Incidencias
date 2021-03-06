<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Support - Project 1
        User::create([ // 3
        	'name' => 'Soporte Carlos',
        	'email' => 'support1@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 1
        ]);
        User::create([ // 4
        	'name' => 'Soporte Mar',
        	'email' => 'support2@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 1
        ]);
    }
}
