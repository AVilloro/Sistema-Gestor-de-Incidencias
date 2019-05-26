<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Admin
        User::create([
        	'name' => 'Alba',
        	'email' => 'albavilloro@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 0
        ]);

        // Client
        User::create([
        	'name' => 'Claudia',
        	'email' => 'claudiaayu@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 2
        ]);
    }
}
